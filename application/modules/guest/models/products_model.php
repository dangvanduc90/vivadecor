<?php
	class Products_model extends Cms_Base_model {
		function __construct() {
			parent::__construct();
		}

		private function get_recursive_categories($CategoriesProductsID) {
            $parentId = $CategoriesProductsID; // the parent id
            $arrAllChild = Array(); // array that will store all children
            while (true) {
                $arrChild = Array(); // array for storing children in this iteration
                $q = 'SELECT `CategoriesProductsID` FROM `categoriesproducts` WHERE `ParentID` IN (' . $parentId . ')';
                $rs = mysqli_query($this->db->conn_id, $q);
                while ($r = mysqli_fetch_assoc($rs)) {
                    $arrChild[] = $r['CategoriesProductsID'];
                    $arrAllChild[] = $r['CategoriesProductsID'];
                }
                if (empty($arrChild)) { // break if no more children found
                    break;
                }
                $parentId = implode(',', $arrChild); // generate comma-separated string of all children and execute the query again
            }
            return ($arrAllChild);
        }

        private function get_recursive_brand($SortingBrandID) {
            $parentId = $SortingBrandID; // the parent id
            $arrAllChild = Array(); // array that will store all children
            while (true) {
                $arrChild = Array(); // array for storing children in this iteration
                $q = 'SELECT `SortingBrandID` FROM `sortingbrand` WHERE `ParentID` IN (' . $parentId . ')';
                $rs = mysqli_query($this->db->conn_id, $q);
                while ($r = mysqli_fetch_assoc($rs)) {
                    $arrChild[] = $r['SortingBrandID'];
                    $arrAllChild[] = $r['SortingBrandID'];
                }
                if (empty($arrChild)) { // break if no more children found
                    break;
                }
                $parentId = implode(',', $arrChild); // generate comma-separated string of all children and execute the query again
            }
            return ($arrAllChild);
        }

        function get_categories_id_by_slug($Slug){
            $this -> db -> select('CategoriesProductsID');
            $this -> db -> from("categoriesproducts");
            $this -> db -> where("Slug", $Slug);
            $query = $this -> db -> get();
            $result = $query -> row();
            return $result -> CategoriesProductsID;
        }

        function get_brand_id_by_slug($Slug){
            $this -> db -> select('SortingBrandID');
            $this -> db -> from("categoreisbrand");
            $this -> db -> where("Slug", $Slug);
            $query = $this -> db -> get();
            $result = $query -> row();
            return $result -> CategoriesProductsID;
        }

		function get_child_categories($id){
			$this -> db -> from("categoriesproducts");
            $this -> db -> where("ParentID", $id);
			$this -> db -> order_by("Orders", "desc");
			$query = $this -> db -> get();
            return $query -> result();
        }

        function get_product_image_by_product_id($product_id) {
            $this -> db -> select('ImageURL,ImagePreset,TitleText,AltText');
            $this -> db -> from('imageproducts');
            $this -> db -> where('ProductsID', $product_id);
            $this -> db -> order_by('IsMainImage', 'desc');
            $this -> db -> order_by('Orders', 'asc');
            $query = $this -> db -> get();
            if($query -> result()){
                $result = $query -> result();
                foreach ($result as $re){
                    $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
                }
                return $result;
            } else{
                return false;
            }
        }


        function Get_new_products($limit = 0,$start = 0,$ParentID = false){
        	global $lang;
            if($ParentID){
            	$parent_list = $this -> get_recursive_categories($ParentID);
                $parent_list[] = $ParentID;
            }
        	if($lang == 'en'){
        		$this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
        	} else if ($lang =='fr'){
        		$this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
        	} else {
        		$this -> db -> select('products.ProductsID,products.Title as Title,products.Description as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
        	}

            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            if($ParentID){
                $this -> db -> where_in('products.CategoriesProductsID', $parent_list);
            }
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsNew', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            if($limit && $start){
                $this -> db -> limit($limit,$start);
            } else if ($limit) {
                $this -> db -> limit($limit,0);
            }
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_hot_products($limit = 0,$start = 0,$ParentID = false){
            global $lang;
            if($ParentID){
                $parent_list = $this -> get_recursive_categories($ParentID);
                $parent_list[] = $ParentID;
            }
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else if ($lang =='fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else {
                $this -> db -> select('products.ProductsID,products.Title as Title,products.Description as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            }

            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            if($ParentID){
                $this -> db -> where_in('products.CategoriesProductsID', $parent_list);
            }
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            if($limit && $start){
                $this -> db -> limit($limit,$start);
            } else if ($limit) {
                $this -> db -> limit($limit,0);
            }
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_seller_products($limit = 0,$start = 0,$ParentID = false){
            global $lang;
            if($ParentID){
                $parent_list = $this -> get_recursive_categories($ParentID);
                $parent_list[] = $ParentID;
            }
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else if ($lang =='fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else {
                $this -> db -> select('products.ProductsID,products.Title as Title,products.Description as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            }

            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            if($ParentID){
                $this -> db -> where_in('products.CategoriesProductsID', $parent_list);
            }
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsSellers', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            if($limit && $start){
                $this -> db -> limit($limit,$start);
            } else if ($limit) {
                $this -> db -> limit($limit,0);
            }
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_promotion_products($limit = 0,$start = 0,$ParentID = false){
            global $lang;
            if($ParentID){
                $parent_list = $this -> get_recursive_categories($ParentID);
                $parent_list[] = $ParentID;
            }
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else if ($lang =='fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else {
                $this -> db -> select('products.ProductsID,products.Title as Title,products.Description as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            }

            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            if($ParentID){
                $this -> db -> where_in('products.CategoriesProductsID', $parent_list);
            }
            $this -> db -> where('products.Publish', 1);
            $this -> db -> where('products.IsPromotion', 1);
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            if($limit && $start){
                $this -> db -> limit($limit,$start);
            } else if ($limit) {
                $this -> db -> limit($limit,0);
            }
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

		function Get_details($slug){
			global $lang;
			if($lang == 'en'){
				$this -> db -> select('products.ProductsID,products.SKU,products.Title as hiddenTitle,products.Title_en as Title,products.Description_en as Description,products.Desc_en as `Desc`,products.Body_en as Body,products.Body2_en as Body2,products.Body3_en as Body3,products.Slug,products.CategoriesProductsID,products.SortingBrandID,products.SEOTitle,products.SEOKeyword,products.SEODescription,products.SellPrice,products.ListPrice,products.Hightlight,products.ImageAlt,products.ImageURL,products.ImagePreset,products.IsStock,products.Tags,products.Warranty');
			} else if($lang == 'fr'){
				$this -> db -> select('products.ProductsID,products.SKU,products.Title as hiddenTitle,products.Title_fr as Title,products.Description_fr as Description,products.Desc_fr as `Desc`,products.Body_fr as Body,products.Body2_fr as Body2,products.Body3_fr as Body3,products.Slug,products.CategoriesProductsID,products.SortingBrandID,products.SEOTitle,products.SEOKeyword,products.SEODescription,products.SellPrice,products.ListPrice,products.Hightlight,products.ImageAlt,products.ImageURL,products.ImagePreset,products.IsStock,products.Tags,products.Warranty');
			} else {
				$this -> db -> select('products.ProductsID,products.SKU,products.Title as hiddenTitle,products.Title,products.Description,products.Desc as `Desc`,products.Body,products.Body2,products.Body3,products.Slug,products.CategoriesProductsID,products.SortingBrandID,products.SEOTitle,products.SEOKeyword,products.SEODescription,products.SellPrice,products.ListPrice,products.Hightlight,products.ImageAlt,products.ImageURL,products.ImagePreset,products.IsStock,products.Tags,products.Warranty,products.CreatedDate,products.ModifiedDate');
			}
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.Publish', 1);
            $this -> db -> where('products.Slug', $slug);
            $query = $this -> db -> get();
            $product = $query -> row();

            if($product){
                $product -> ImageURL = $product -> ImagePreset . $product -> ImageURL;
	            return $product;
            } else {return false;}
        }

		function Get_details_by_id($id){
			global $lang;
			if($lang == 'en'){
				$this -> db -> select('products.ProductsID,products.SKU,products.Title as hiddenTitle,products.Title_en as Title,products.Description_en as Description,products.Desc_en as `Desc`,products.Body_en as Body,products.Body2_en as Body2,products.Body3_en as Body3,products.Slug,products.CategoriesProductsID,products.SortingBrandID,products.SEOTitle,products.SEOKeyword,products.SEODescription,products.SellPrice,products.ListPrice,products.Hightlight,products.ImageAlt,products.ImageURL,products.ImagePreset,products.IsStock,products.Tags,products.Warranty');
			} else if($lang == 'fr'){
				$this -> db -> select('products.ProductsID,products.SKU,products.Title as hiddenTitle,products.Title_fr as Title,products.Description_fr as Description,products.Desc_fr as `Desc`,products.Body_fr as Body,products.Body2_fr as Body2,products.Body3_fr as Body3,products.Slug,products.CategoriesProductsID,products.SortingBrandID,products.SEOTitle,products.SEOKeyword,products.SEODescription,products.SellPrice,products.ListPrice,products.Hightlight,products.ImageAlt,products.ImageURL,products.ImagePreset,products.IsStock,products.Tags,products.Warranty');
			} else {
//				$this -> db -> select('products.ProductsID,products.SKU,products.Title as hiddenTitle,products.Title,products.Description,products.Desc as `Desc`,products.Body,products.Body2,products.Body3,products.Slug,products.CategoriesProductsID,products.SortingBrandID,products.SEOTitle,products.SEOKeyword,products.SEODescription,products.SellPrice,products.ListPrice,products.Hightlight,products.ImageAlt,products.ImageURL,products.ImagePreset,products.IsStock,products.Tags,products.Warranty,products.CreatedDate,products.ModifiedDate');
                            $this->db->select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,products.SortingBrandID,products.SortingResID,products.SortingChannelID,sortingres.Title as srtres_Title,sortingprice.Title as srtprice_Title');

            }


            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID', 'left');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID', 'left');

            $this -> db -> where('products.Publish', 1);
            $this -> db -> where('products.ProductsId', $id);
            $query = $this -> db -> get();
            $product = $query -> row();

            if($product){
                $product -> ImageURL = $product -> ImagePreset . $product -> ImageURL;
	            return $product;
            } else {return false;}
        }

        function Get_breadcrumb($CategoriesProductsID, $breadcrumb_list = false){
        	global $lang;
            if($lang == 'en'){
				$this -> db -> select('categoriesproducts.ParentID,categoriesproducts.Title_en as Title,Slug');
			} else if($lang == 'fr'){
				$this -> db -> select('categoriesproducts.ParentID,categoriesproducts.Title_fr as Title,Slug');
			} else {
				$this -> db -> select('categoriesproducts.ParentID,categoriesproducts.Title,,Slug');
			}
            $this -> db -> from('categoriesproducts');
            $this -> db -> where('CategoriesProductsID', $CategoriesProductsID);
            $query = $this -> db -> get();
            $breadcrumb = $query -> result();
            $breadcrumb_list[] = $breadcrumb[0];

            if ($breadcrumb[0] -> ParentID != 0) {
                return $this -> Get_breadcrumb($breadcrumb[0] -> ParentID, $breadcrumb_list);
            } else {
                return $breadcrumb_list;
            }
        }

        function Get_breadcrumb_by_brand($SortingBrandID, $breadcrumb_list = false){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('sortingbrand.ParentID,sortingbrand.Title_en as Title,Slug');
            } else if($lang == 'fr'){
                $this -> db -> select('sortingbrand.ParentID,sortingbrand.Title_fr as Title,Slug');
            } else {
                $this -> db -> select('sortingbrand.ParentID,sortingbrand.Title,,Slug');
            }
            $this -> db -> from('sortingbrand');
            $this -> db -> where('SortingBrandID', $SortingBrandID);
            $query = $this -> db -> get();
            $breadcrumb = $query -> result();
            $breadcrumb_list[] = $breadcrumb[0];

            if ($breadcrumb[0] -> ParentID != 0) {
                return $this -> Get_breadcrumb($breadcrumb[0] -> ParentID, $breadcrumb_list);
            } else {
                return $breadcrumb_list;
            }
        }

        function Get_relative($CategoriesProductsID, $ProductsID){
        	global $lang;
            $parent_list = $this -> get_recursive_categories($CategoriesProductsID);
            $parent_list[] = $CategoriesProductsID;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else if ($lang =='fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else {
                $this -> db -> select('products.ProductsID,products.Title as Title,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.ImageTitle');
            }
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.Publish', 1);
            $this -> db -> where_in('products.CategoriesProductsID', $parent_list);
            $this -> db -> where_not_in('products.ProductsID', $ProductsID);
            $this -> db -> order_by('products.ProductsID', 'random');
            // $this -> db -> limit(6, 0);
            $query = $this -> db -> get();
            $result = $query -> result_array();
            foreach ($result as $re){
                $re['ImageURL'] = $re['ImagePreset'] . $re['ImageURL'];
            }
            return $result;
        }

        function Get_relative_by_brand($SortingBrandID, $ProductsID){
            global $lang;
            $parent_list = $this -> get_recursive_brand($SortingBrandID);
            $parent_list[] = $SortingBrandID;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else if ($lang =='fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else {
                $this -> db -> select('products.ProductsID,products.Title as Title,products.Description as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            }
            $this -> db -> from('products');
            $this -> db -> join('sortingbrand', 'sortingbrand.SortingBrandID = products.SortingBrandID');
            $this -> db -> where('products.Publish', 1);
            $this -> db -> where_in('products.SortingBrandID', $parent_list);
            $this -> db -> where_not_in('products.ProductsID', $ProductsID);
            $this -> db -> order_by('products.ProductsID', 'random');
            $this -> db -> limit(8, 0);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_hightlight($Hightlight){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else if ($lang =='fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            } else {
                $this -> db -> select('products.ProductsID,products.Title as Title,products.Description as Description,products.Slug,products.ImageURL,products.ImagePreset,products.ImageAlt,products.SellPrice,products.ListPrice');
            }
            $this->db->from('products');
            $this->db->where_in('ProductsID',explode(",",$Hightlight));
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function get_product_tags($Tags){
            if($Tags){
                preg_match_all("/\[(.*?)\]/",$Tags,$Tags);
                $this->db->select('Title,Slug');
                $this->db->from('productstags');
                $this->db->where_in('TagsID',$Tags[1]);
                $this -> db -> order_by('Orders', 'asc');
                $this -> db -> order_by('CreatedDate', 'desc');
                $query = $this->db->get();
                if($query -> num_rows() > 0) {
                    return $query -> result();
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        private function Get_price_limit($SortingPriceID){
            $this -> db -> select('PriceFrom,PriceTo');
            $this -> db -> from('sortingprice');
            $this -> db -> where('SortingPriceID', $SortingPriceID);
            $query = $this -> db -> get();
            return $query -> row();
        }

        function Get_pagination_number($ParentID, $sort){
            global $lang;
            if(isset($sort['p'])){
                $parameter = $this -> Get_price_limit($sort['p']);
            }
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where_in('products.CategoriesProductsID', $ParentID);
            foreach($ParentID as $PID){
                $this -> db -> or_where("(`products`.`SubCategoriesProductsID` = ". $PID ." OR `products`.`SubCategoriesProductsID` LIKE '%".$PID.",%' OR `products`.`SubCategoriesProductsID` LIKE '%,".$PID."%')", NULL, FALSE);
            }
            $this -> db -> where('products.Publish', 1);
            if(isset($sort['p'])){
                $this -> db -> where('products.SellPrice >=', $parameter -> PriceFrom);
                $this -> db -> where('products.SellPrice <=', $parameter -> PriceTo);
            }
            if(isset($sort['b'])){
                $this -> db -> where('products.SortingBrandID', $sort['b']);
            }
            if(isset($sort['r'])){
                $this -> db -> where('products.SortingResID', $sort['r']);
            }
            if(isset($sort['c'])){
                $this -> db -> where('products.SortingChannelID', $sort['c']);
            }
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        // function Get_pagination_number_by_brand($ParentID){
        //     $this -> db -> select('ProductsID');
        //     $this -> db -> from('products');
        //     $this -> db -> join('sortingbrand', 'sortingbrand.SortingBrandID = products.SortingBrandID');
        //     $this -> db -> where_in('products.SortingBrandID', $ParentID);
        //     $this -> db -> where('products.Publish', 1);
        //     $query = $this -> db -> get();
        //     return $query -> num_rows();
        // }

        function Get_pagination_product($limit, $start, $ParentID, $sort, $SortingPriceID){
            global $lang;
            if(isset($sort['p'])){
                $parameter = $this -> Get_price_limit($sort['p']);
            }
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,products.SortingBrandID,products.SortingResID,products.SortingChannelID');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,products.SortingBrandID,products.SortingResID,products.SortingChannelID');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,products.SortingBrandID,products.SortingResID,products.SortingChannelID,sortingres.Title as srtres_Title,sortingprice.Title as srtprice_Title');
            }
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID', 'left');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID', 'left');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID', 'left');
            $this -> db -> where_in('products.CategoriesProductsID', $ParentID);
            // foreach($ParentID as $PID){
            //     $this -> db -> or_where("(`products`.`SubCategoriesProductsID` = ". $PID ." OR `products`.`SubCategoriesProductsID` LIKE '%".$PID.",%' OR `products`.`SubCategoriesProductsID` LIKE '%,".$PID."%')", NULL, FALSE);
            // }
            $this -> db -> where('products.Publish', 1);
            // if(isset($sort['p'])){
            //     $this -> db -> where('products.SellPrice >=', $parameter -> PriceFrom);
            //     $this -> db -> where('products.SellPrice <=', $parameter -> PriceTo);
            // }
            if(isset($sort['b'])){
                $this -> db -> where('products.SortingBrandID', $sort['b']);
            }
            if(isset($sort['r'])){
                $this -> db -> where('products.SortingResID', $sort['r']);
            }
            if(isset($sort['c'])){
                $this -> db -> where('products.SortingChannelID', $sort['c']);
            }
            if(isset($sort['o'])){
                if($sort['o'] == "p-asc") {
                    $this -> db -> order_by('products.SellPrice', 'asc');
                } else if($sort['o'] == "p-desc"){
                    $this -> db -> order_by('products.SellPrice', 'desc');
                }
            }
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $product = $query -> result();

            $list_brand = "";
            $list_res = "";
            $list_channel = "";
            $list_price = "";

            foreach ($product as $pro){
                $list_brand .= $pro -> SortingBrandID . ",";
                $list_res .= $pro -> SortingResID . ",";
                $list_channel .= $pro -> SortingChannelID . ",";
                $list_price .= $pro -> SellPrice . ",";

                $pro -> ImageURL = $pro -> ImagePreset . $pro -> ImageURL;
            }
            if($product){
            	$product[0] -> ListOBrand = $this -> Get_Sorting_Brand(rtrim($list_brand,","));
	            $product[0] -> ListORes = $this -> Get_Sorting_Res(rtrim($list_res,","));
	            $product[0] -> ListOChannel = $this -> Get_Sorting_Channel(rtrim($list_channel,","));
	            $product[0] -> ListOPrice = $this -> Get_Sorting_Price(rtrim($list_price,","),$SortingPriceID);
            }
            return $product;
        }

        private function Get_Sorting_Brand($result){
            global $lang;
            if($result == ""){return false;}
            else {
                $array = explode(",",$result);
                $this -> db -> select('SortingBrandID,Title,Slug');
                $this -> db -> from('sortingbrand');
                $this -> db -> where('Publish', 1);
                $this -> db -> where_in('SortingBrandID',$array);
                $query = $this -> db -> get();
                return $query -> result();
            }
        }

        private function Get_Sorting_Price($result,$SortingPriceID){
            global $lang;
            if($result == ""){return false;}
            else {
                $ListOID = "";
                $ListOPrice = explode(",",$result);
                $LimitSortingPriceID = explode(",",$SortingPriceID);
                foreach ($ListOPrice as $Price){
                    $this -> db -> select('SortingPriceID');
                    $this -> db -> from('sortingprice');
                    $this -> db -> where('Publish', 1);
                    // $this -> db -> where('PriceFrom <=',$Price);
                    // $this -> db -> where('PriceTo >=',$Price);
                    $query = $this -> db -> get();
                    $result = $query -> result();
                    foreach ($result as $re){
                        $ListOID .= $re -> SortingPriceID . ",";
                    }
                }
                $array = explode(",",$ListOID);
                $this -> db -> select('SortingPriceID,Title');
                $this -> db -> from('sortingprice');
                $this -> db -> where('Publish', 1);
                $this -> db -> where_in('SortingPriceID',$array);
                $this -> db -> where_in('SortingPriceID',$LimitSortingPriceID);
                $query = $this -> db -> get();
                return $query -> result();
            }
        }

        private function Get_Sorting_Res($result){
            global $lang;
            if($result == ""){return false;}
            else {
                $array = explode(",",$result);
                $this -> db -> select('SortingResID,Title');
                $this -> db -> from('sortingres');
                $this -> db -> where('Publish', 1);
                $this -> db -> where_in('SortingResID',$array);
                $query = $this -> db -> get();
                return $query -> result();
            }
        }

        private function Get_Sorting_Channel($result){
            global $lang;
            if($result == ""){return false;}
            else {
                $array = explode(",",$result);
                $this -> db -> select('SortingChannelID,Title');
                $this -> db -> from('sortingchannel');
                $this -> db -> where('Publish', 1);
                $this -> db -> where_in('SortingChannelID',$array);
                $query = $this -> db -> get();
                return $query -> result();
            }
        }

        function Get_pagination_product_by_brand($limit, $start, $ParentID){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,sortingres.Title as srtres_Title,sortingprice.Title as srtprice_Title');
            }
            $this -> db -> from('products');
            $this -> db -> join('sortingbrand', 'sortingbrand.SortingBrandID = products.SortingBrandID', 'left');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID', 'left');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID', 'left');
            $this -> db -> where_in('products.SortingBrandID', $ParentID);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_pagination_number_by_brand($ParentID){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('sortingbrand', 'sortingbrand.SortingBrandID = products.SortingBrandID');
            $this -> db -> where_in('products.SortingBrandID', $ParentID);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_pagination_product_by_channel($limit, $start, $ParentID){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,sortingres.Title as srtres_Title,sortingprice.Title as srtprice_Title');
            }
            $this -> db -> from('products');
            $this -> db -> join('sortingbrand', 'sortingbrand.SortingBrandID = products.SortingBrandID', 'left');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID', 'left');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID', 'left');
            $this -> db -> where_in('products.SortingChannelID', $ParentID);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_pagination_number_by_channel($ParentID){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('sortingchannel', 'sortingchannel.SortingChannelID = products.SortingChannelID');
            $this -> db -> where_in('products.SortingChannelID', $ParentID);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_pagination_product_by_price($limit, $start, $ParentID){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,sortingres.Title as srtres_Title,sortingprice.Title as srtprice_Title');
            }
            $this -> db -> from('products');
            $this -> db -> join('sortingbrand', 'sortingbrand.SortingBrandID = products.SortingBrandID', 'left');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID', 'left');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID', 'left');
            $this -> db -> where_in('products.SortingPriceID', $ParentID);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_pagination_number_by_price($ParentID){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID');
            $this -> db -> where_in('products.SortingPriceID', $ParentID);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_pagination_product_by_res($limit, $start, $ParentID){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,sortingres.Title as srtres_Title,sortingprice.Title as srtprice_Title');
            }
            $this -> db -> from('products');
            $this -> db -> join('sortingbrand', 'sortingbrand.SortingBrandID = products.SortingBrandID', 'left');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID', 'left');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID', 'left');
            $this -> db -> where_in('products.SortingResID', $ParentID);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_pagination_number_by_res($ParentID){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID');
            $this -> db -> where_in('products.SortingResID', $ParentID);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_new_pagination_number(){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            // $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.IsNew', 1);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_new_pagination_product($limit, $start){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,sortingres.Title as srtres_Title,sortingprice.Title as srtprice_Title');
            }
            $this -> db -> from('products');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID', 'left');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID', 'left');
            $this -> db -> where('products.IsNew', 1);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_hot_pagination_number(){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.IsHot', 1);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_hot_pagination_product($limit, $start){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt,sortingres.Title as srtres_Title,sortingprice.Title as srtprice_Title');
            }
            $this -> db -> from('products');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID', 'left');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID', 'left');
            $this -> db -> where('products.IsHot', 1);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
                $re -> ImageURLThumb = $re -> ImagePreset ."thumbs/". $re -> ImageURL;
            }
            return $result;
        }

        function Get_sellers_pagination_number(){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.IsSellers', 1);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_sellers_pagination_product($limit, $start){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            }
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.IsSellers', 1);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_promotion_pagination_number(){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.IsPromotion', 1);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_promotion_pagination_product($limit, $start){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            }
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.IsPromotion', 1);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_stock_pagination_number(){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.IsPromotion', 1);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_stock_pagination_product($limit, $start){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            }
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.IsPromotion', 1);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_search_pagination_number($option){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            // if($option['dm']){
            //     $ParentID = $this -> get_categories_id_by_slug($option['dm']);
            //     $parent_list = $this -> get_recursive_categories($ParentID);
            //     $parent_list[] = $ParentID;
            //     $this -> db -> where_in('products.CategoriesProductsID', $parent_list);
            // }
            // if($option['hsx']){
            //     $ParentID = $this -> get_brand_id_by_slug($option['hsx']);
            //     $parent_list = $this -> get_recursive_brand($ParentID);
            //     $parent_list[] = $ParentID;
            //     $this -> db -> where_in('products.CategoriesProductsID', $parent_list);
            // }
            if($option['t']){
                $this -> db -> like('products.Title', $option['t']);
            }
            // if($option['gt']){
            //     $this -> db -> where('products.SellPrice >=', $option['gt']);
            // }
            // if($option['gd']){
            //     $this -> db -> where('products.SellPrice <=', $option['gd']);
            // }
            if($option['dien-tich']){
                $this -> db -> where_in('products.SortingPriceID', $option['dien-tich']);
            }
            if($option['phong']){
                $this -> db -> where_in('products.SortingChannelID', $option['phong']);
            }
            if($option['mausac']){
                $this -> db -> where_in('products.SortingBrandID', $option['mausac']);
            }
            if($option['phong-cach']){
                $this -> db -> where_in('products.SortingResID', $option['phong-cach']);
            }
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_search_pagination_products($limit, $start, $option){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt, sortingres.Title as srtres_Title,sortingprice.Title as srtprice_Title');
            }
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID', 'left');
            $this -> db -> join('sortingres', 'sortingres.SortingResID = products.SortingResID', 'left');
            $this -> db -> join('sortingprice', 'sortingprice.SortingPriceID = products.SortingPriceID', 'left');
            // if($option['dm']){
            //     $ParentID = $this -> get_categories_id_by_slug($option['dm']);
            //     $parent_list = $this -> get_recursive_categories($ParentID);
            //     $parent_list[] = $ParentID;
            //     $this -> db -> where_in('products.CategoriesProductsID', $parent_list);
            // }
            // if($option['hsx']){
            //     $ParentID = $this -> get_brand_id_by_slug($option['hsx']);
            //     $parent_list = $this -> get_recursive_brand($ParentID);
            //     $parent_list[] = $ParentID;
            //     $this -> db -> where_in('products.CategoriesProductsID', $parent_list);
            // }
            if($option['t']){
                $this -> db -> like('products.Title', $option['t']);
            }
            if($option['dien-tich']){
                $this -> db -> where_in('products.SortingPriceID', $option['dien-tich']);
            }
            if($option['phong']){
                $this -> db -> where_in('products.SortingChannelID', $option['phong']);
            }
            if($option['mausac']){
                $this -> db -> where_in('products.SortingBrandID', $option['mausac']);
            }
            if($option['phong-cach']){
                $this -> db -> where_in('products.SortingResID', $option['phong-cach']);
            }
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

        function Get_tag_details($slug){
            $this -> db -> from('productstags');
            $this -> db -> where('productstags.Publish', 1);
            $this -> db -> where('productstags.Slug', $slug);
            $query = $this -> db -> get();
            return $query -> row();
        }

        function Get_tag_pagination_number($TagsID){
            $this -> db -> select('ProductsID');
            $this -> db -> from('products');
            $this -> db -> where("(`products`.`Tags` = ".$TagsID ." OR `products`.`Tags` LIKE '%".$TagsID.",%' OR `products`.`Tags` LIKE '%,".$TagsID."%')", NULL, FALSE);
            $this -> db -> where('products.Publish', 1);
            $query = $this -> db -> get();
            return $query -> num_rows();
        }

        function Get_tag_pagination_products($limit, $start, $TagsID){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.ProductsID,products.Title_en as Title,products.Description_en as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else if($lang == 'fr'){
                $this -> db -> select('products.ProductsID,products.Title_fr as Title,products.Description_fr as Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            } else {
                $this -> db -> select('products.ProductsID,products.Title,products.Description,products.Slug,products.SellPrice,products.ListPrice,products.ImageURL,products.ImagePreset,products.ImageTitle,products.ImageAlt');
            }
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where("(`products`.`Tags` = ".$TagsID ." OR `products`.`Tags` LIKE '%".$TagsID.",%' OR `products`.`Tags` LIKE '%,".$TagsID."%')", NULL, FALSE);
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $this -> db -> limit($limit, $start);
            $query = $this -> db -> get();
            $result = $query -> result();
            foreach ($result as $re){
                $re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
        }

		public function Prd_image_get_all($prdid = false) {
			if($prdid !== false) {
                $this -> db -> from('imageproducts');
                $this -> db -> where('ProductsID', $prdid);
                $this -> db -> order_by('IsMainImage', 'desc');
                $this -> db -> order_by('Orders', 'asc');
				$query = $this -> db -> get();
                return $query -> result();
			}
		}

        function get_product_for_search_box(){
            global $lang;
            if($lang == 'en'){
                $this -> db -> select('products.Title_en as Title,products.Slug,products.SellPrice,products.ImageURL,products.ImagePreset');
            } else if($lang == 'fr'){
                $this -> db -> select('products.Title_fr as Title,products.Slug,products.SellPrice,products.ImageURL,products.ImagePreset');
            } else {
                $this -> db -> select('products.Title,products.Slug,products.SellPrice,products.ImageURL,products.ImagePreset');
            }
            $this -> db -> from('products');
            $this -> db -> join('categoriesproducts', 'categoriesproducts.CategoriesProductsID = products.CategoriesProductsID');
            $this -> db -> where('products.Publish', 1);
            $this -> db -> order_by('products.IsHot', 'desc');
            $this -> db -> order_by('products.Orders', 'asc');
            $this -> db -> order_by('products.CreatedDate', 'desc');
            $query = $this -> db -> get();
            $result = $query -> result_array();
            foreach ($result as $re){
                $re['ImageURL'] = $re['ImagePreset'] . $re['ImageURL'];
            }
            return $result;
        }

        public function list_products_group_by_section()
        {
            $this->load->model('sections_model');
            $this->load->model('sections_products_pivot_model');

            $sections = $this->sections_model->get_all();
            $sections = $sections->result_array();

            foreach ($sections as $key => $section) {
                $sections_products = $this->sections_products_pivot_model->list_by_section_id($section['id']);

                $products = [];
                foreach ($sections_products as $pivot) {
                    $product = self::Get_details_by_id($pivot['product_id']);
                    array_push($products, $product);
                }
                $sections[$key]['products'] = $products;
            }
            return $sections;
        }
	}
?>