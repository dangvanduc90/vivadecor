<?php

	class Guest extends CMS_BaseController {



		function __construct()

		{

			parent::__construct();

			$this -> load -> model('main_model');

		}



		function amp(){

			echo "amp site";

		}

		function error_404(){

			$data = $this -> main_model -> general();
			$this->output->set_status_header('404');
			$this -> load -> view('guest/error_404', $data);

		}

		function error_404_redirect(){

			redirect('error-404.html');

		}

		function trang_chu($message = false){
			global $lang;

			$data = $this -> main_model -> general();

			// var_dump($this->config->item('paypaltest'));die();

			// $this -> load -> library('pagination');

			// $config["base_url"] = base_url().'trang-chu?';

			// $config["uri_segment"] = 2;

			// $config["enable_query_strings"] = TRUE;

			// $config["page_query_string"] = TRUE;

			// $config['query_string_segment'] = 'trang';

			// $config["total_rows"] = $this -> products_model -> Get_new_pagination_number();

			// $config["per_page"] = $data["per_page"] = 9;

			// $config['next_link'] = "sau";

			// $config['prev_link'] = "trước";

			// $config['last_link'] = 'cuối';

			// $config['first_link'] = 'đầu';

			// $config['use_page_numbers'] = TRUE;

			// $this -> pagination -> initialize($config);

			// $data['links'] = $this -> pagination -> create_links();

			// $data['page'] = (isset($_GET['trang']) && $_GET['trang']) ? $_GET['trang'] : 0;

			// $offset = ($data['page']  == 0) ? 0 : ($data['page'] * $config['per_page']) - $config['per_page'];

			$data['record'] = $record = $this -> products_model -> Get_new_pagination_number();
			$data['display'] = $display = 6;
			if($record > $display) {
				$data['total_page'] = $total_page = ceil($record/$display);
			} else {
				$data['total_page'] = $total_page = 1;
			}

			$start = (isset($_GET['start']) && (int)$_GET['start']>=0) ? $_GET['start'] : 0;
			$data['current_page'] = $current_page = ($start/$display)+1;
			$data['end_page'] = $end_page = $total_page;
			$start_page = 1;
			$offset = $start * $display;
			$data['productsList'] = $this -> products_model -> Get_new_pagination_product($display, $offset);
			if ($data['productsList']) {
				foreach ($data['productsList'] as $key => $value) {
					$value -> Description = $this->trim_text($value -> Description, 150);
				}
			}


			// $data['HotProducts'] = $this -> products_model -> Get_hot_products(8);

			// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(8);

			// $data['PromoProducts'] = $this -> products_model -> Get_promotion_products(13);

			// $data['gallery'] = $this -> ads_model -> Ads_get_for_show(1);

			// $data['banner_ads'] = $this -> ads_model -> Ads_get_for_show(2);

			$data['menu'] = $this -> menu_model -> Menu_get_all('trang-chu');

			$data['sub_menu'] = $this -> menu_model -> Menu_sub_get_all();


			$this -> load -> model('partners_model');
			$data['partners'] = $this -> partners_model -> getAll();

			$data['faq'] = $parent = $this -> categories_news_model -> Get_cate_and_detail_news(24, 5, 1);

			

			if($message){

				$data['message'] = $message;

			}



			$this -> load -> view('guest/main_index', $data);

		}



		function products($slug = "") {
			global $lang;

			$data = $this -> main_model -> general();

			$data['menu'] = $this -> menu_model -> Menu_get_all('san-pham');

			$data['isRibbon'] = false;

			if (!$slug) {

				redirect('error-404.html');

			} else if ($slug == "moi") {

				$this -> load -> library('pagination');

				$config["base_url"] = base_url().'moi';

				$config["uri_segment"] = 2;

				$config["enable_query_strings"] = TRUE;

				// $config["page_query_string"] = TRUE;

				$config['query_string_segment'] = 'trang';

				$config["total_rows"] = $this -> products_model -> Get_new_pagination_number();

				$config["per_page"] = $data["per_page"] = 9;

				$config['next_link'] = "sau";

				$config['prev_link'] = "trước";

				$config['last_link'] = 'cuối';

				$config['first_link'] = 'đầu';

				$config['prefix'] = 'trang-';

				// $config['use_page_numbers'] = TRUE;

				$this -> pagination -> initialize($config);

				$data['links'] = $this -> pagination -> create_links();

				$this -> pagination -> initialize($config);
				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				$data['productsList'] = $this -> products_model -> Get_new_pagination_product($config["per_page"], $offset);

				if ($data['productsList']) {

					foreach ($data['productsList'] as $key => $value) {

						$value -> Description = $this->trim_text($value -> Description, 150);

					}

				}

				$data['links'] = $this -> pagination -> create_links();

				$this -> breadcrumb -> append_crumb("Trang chủ", base_url());

				$this -> breadcrumb -> append_crumb("Sản phẩm mới", base_url(). "moi");

				$data['breadcrumb'] = $this -> breadcrumb -> output();

				$data['parent'] = new StdClass();

				$data['parent'] -> Title = "Sản phẩm mới";

				$this -> load -> view('guest/main_product1.php', $data);

			} else if ($slug == "du-an-hoan-thanh") {

				$this -> load -> library('pagination');

				$config["base_url"] = base_url().'du-an-hoan-thanh';

				$config["uri_segment"] = 2;

				$config["enable_query_strings"] = TRUE;

				// $config["page_query_string"] = TRUE;

				$config['query_string_segment'] = 'trang';

				$config["total_rows"] = $this -> products_model -> Get_new_pagination_number();

				$config["per_page"] = $data["per_page"] = 9;

				$config['next_link'] = "sau";

				$config['prev_link'] = "trước";

				$config['last_link'] = 'cuối';

				$config['first_link'] = 'đầu';
				$config['prefix'] = 'trang-';

				// $config['use_page_numbers'] = TRUE;

				$this -> pagination -> initialize($config);

				$data['links'] = $this -> pagination -> create_links();

				$this -> pagination -> initialize($config);
				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				$data['productsList'] = $this -> products_model -> Get_hot_pagination_product($config["per_page"], $offset);

				$data['links'] = $this -> pagination -> create_links();

				$this -> breadcrumb -> append_crumb("Trang chủ", base_url());

				$this -> breadcrumb -> append_crumb("Sản phẩm nổi bật", base_url(). "noi-bat");



				if ($data['productsList']) {

					foreach ($data['productsList'] as $key => $value) {

						$value -> Description = $this->trim_text($value -> Description, 150);

					}

				}

				$data['breadcrumb'] = $this -> breadcrumb -> output();

				$data['parent'] = new StdClass();

				$data['parent'] -> Title = "Sản phẩm nổi bật";

				$this -> load -> view('guest/main_product1.php', $data);

			} else if ($slug == "ban-chay") {

				$this -> load -> library('pagination');

				$config["base_url"] = base_url().'ban-chay';

				$config["uri_segment"] = 2;

				$config["enable_query_strings"] = TRUE;

				// $config["page_query_string"] = TRUE;

				$config['query_string_segment'] = 'trang';

				$config["total_rows"] = $this -> products_model -> Get_new_pagination_number();

				$config["per_page"] = $data["per_page"] = 9;

				$config['next_link'] = "sau";

				$config['prev_link'] = "trước";

				$config['last_link'] = 'cuối';

				$config['first_link'] = 'đầu';
				$config['prefix'] = 'trang-';

				// $config['use_page_numbers'] = TRUE;

				$this -> pagination -> initialize($config);

				$data['links'] = $this -> pagination -> create_links();


				$this -> pagination -> initialize($config);
				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				$data['productsList'] = $this -> products_model -> Get_sellers_pagination_product($config["per_page"], $offset);

				$data['links'] = $this -> pagination -> create_links();

				$this -> breadcrumb -> append_crumb("Trang chủ", base_url());

				$this -> breadcrumb -> append_crumb("Sản phẩm bán chạy", base_url(). "ban-chay");


				$data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				$data['latest_news'] = $this -> news_model -> Get_latest_news(3);

				$data['breadcrumb'] = $this -> breadcrumb -> output();

				$data['parent'] = new StdClass();

				$data['parent'] -> Title = "Sản phẩm bán chạy";

				$this -> load -> view('guest/main_product1.php', $data);

			} else if ($slug == "khuyen-mai") {

				$this -> load -> library('pagination');

				$config["base_url"] = base_url().'khuyen-mai';

				$config["uri_segment"] = 2;

				$config["enable_query_strings"] = TRUE;

				// $config["page_query_string"] = TRUE;

				$config['query_string_segment'] = 'trang';

				$config["total_rows"] = $this -> products_model -> Get_new_pagination_number();

				$config["per_page"] = $data["per_page"] = 9;

				$config['next_link'] = "sau";

				$config['prev_link'] = "trước";

				$config['last_link'] = 'cuối';

				$config['first_link'] = 'đầu';

				$config['prefix'] = 'trang-';

				// $config['use_page_numbers'] = TRUE;

				$this -> pagination -> initialize($config);

				$data['links'] = $this -> pagination -> create_links();

				$this -> pagination -> initialize($config);
				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				$data['productsList'] = $this -> products_model -> Get_promotion_pagination_product($config["per_page"], $offset);

				$data['links'] = $this -> pagination -> create_links();

				$this -> breadcrumb -> append_crumb("Trang chủ", base_url());

				$this -> breadcrumb -> append_crumb("Sản phẩm khuyến mãi", base_url(). "khuyen-mai");



				$data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				$data['latest_news'] = $this -> news_model -> Get_latest_news(3);

				$data['breadcrumb'] = $this -> breadcrumb -> output();

				$data['parent'] = new StdClass();

				$data['parent'] -> Title = "Sản phẩm khuyến mãi";

				$this -> load -> view('guest/main_product1.php', $data);

			} else if($this -> categories_product_model -> Get_details($slug)) {

				$data['showSorting'] = true;

				$data['showIntro'] = true;

				$data['parent'] = $parent = $this -> categories_product_model -> Get_details($slug);
				// var_dump($data['parent']);
				$data['parent_child'] = $this -> categories_product_model -> Get_top_child_cate($parent -> CategoriesProductsID);

				$parent_list = $this -> categories_product_model -> Get_categories_tree($data['parent'] -> CategoriesProductsID);

				$parent_list[] = $data['parent'] -> CategoriesProductsID;

				$data['current_query'] = $_SERVER['QUERY_STRING'];

				$data['sort'] = array();

				$data['sort_b'] = false;

				if ($this->input->get('b')) {

					$data['sort_b'] = true;

					$data['sort']['b'] = $this->input->get('b');

					$temp_b = $_GET;

					unset($temp_b['b']);

					unset($temp_b['trang']);

					$data['current_query_brand'] = http_build_query($temp_b);

				} else{

					if($data['current_query'] != ""){

						$temp_b = $_GET;

						unset($temp_b['trang']);

						$data['current_query_brand'] = http_build_query($temp_b);

					}

				}



				$data['sort_p'] = false;

				if ($this->input->get('p')) {

					$data['sort_p'] = true;

					$data['sort']['p'] = $this->input->get('p');

					$temp_p = $_GET;

					unset($temp_p['p']);

					unset($temp_p['trang']);

					$data['current_query_price'] = http_build_query($temp_p);

				} else{

					if($data['current_query'] != ""){

						$temp_p = $_GET;

						unset($temp_p['trang']);

						$data['current_query_price'] = http_build_query($temp_p);

					}

				}



				$data['sort_r'] = false;

				if ($this->input->get('r')) {

					$data['sort_r'] = true;

					$data['sort']['r'] = $this->input->get('r');

					$temp_r = $_GET;

					unset($temp_r['r']);

					unset($temp_r['trang']);

					$data['current_query_res'] = http_build_query($temp_r);

				} else{

					if($data['current_query'] != ""){

						$temp_r = $_GET;

						unset($temp_r['trang']);

						$data['current_query_res'] = http_build_query($temp_r);

					}

				}



				$data['sort_c'] = false;

				if ($this->input->get('c')) {

					$data['sort_c'] = true;

					$data['sort']['c'] = $this->input->get('c');

					$temp_c = $_GET;

					unset($temp_c['c']);

					unset($temp_c['trang']);

					$data['current_query_channel'] = http_build_query($temp_c);

				} else{

					if($data['current_query'] != ""){

						$temp_c = $_GET;

						unset($temp_c['trang']);

						$data['current_query_channel'] = http_build_query($temp_c);

					}

				}



				$data['sort_o'] = false;

				$data['current_query_order'] = http_build_query($_GET);

				if ($this->input->get('o')) {

					$data['sort_o'] = true;

					$data['sort']['o'] = $this->input->get('o');

					$temp_o = $_GET;

					unset($temp_o['o']);

					unset($temp_o['trang']);

					$data['current_query_order'] = http_build_query($temp_o);

				} else{

					if($data['current_query'] != ""){

						$temp_o = $_GET;

						unset($temp_o['trang']);

						$data['current_query_order'] = http_build_query($temp_o);

					}

				}



				if($parent -> SEOTitle){ $data['SEOTitle'] = $parent -> SEOTitle;}

				else {$data['SEOTitle'] = $parent -> Title;}

				if($parent -> SEOKeyword){ $data['SEOKeyword'] = $parent -> SEOKeyword;}

				if($parent -> SEODescription){ $data['SEODescription'] = $parent -> SEODescription;}



				// $this -> load -> library('pagination');

				// $temp_trang = $_GET;

				// unset($temp_trang['trang']);

				// $data['current_query_trang'] = http_build_query($temp_trang);



				// $config["base_url"] = base_url() . $parent -> Slug . "/?" . $data['current_query_trang'];

				// $config["total_rows"] = $this -> products_model -> Get_pagination_number($parent_list,$data['sort']);

				// $config["per_page"] = $data["per_page"] = 8;

				// $config['page_query_string'] = TRUE;

				// $config['query_string_segment'] = 'trang';

				// $data['page'] = 0;

				// if($this->input->get('trang')){

				// 	$data['page'] = $this->input->get('trang');

				// }

				// $offset = ($data['page']  == 0) ? 0 : ($data['page'] * $config['per_page']) - $config['per_page'];



				// $this -> pagination -> initialize($config);





				$this -> load -> library('pagination');

				$config["base_url"] = base_url() . $slug;

				$config["uri_segment"] = 2;

				$config["enable_query_strings"] = TRUE;

				// $config["page_query_string"] = TRUE;

				$config['query_string_segment'] = 'trang';

				$config["total_rows"] = $this -> products_model -> Get_pagination_number($parent_list,$data['sort']);

				$config["per_page"] = $data["per_page"] = 9;

				$config['next_link'] = "sau";

				$config['prev_link'] = "trước";

				$config['last_link'] = 'cuối';

				$config['first_link'] = 'đầu';

				$config['prefix'] = 'trang-';


				$this -> pagination -> initialize($config);

				$data['links'] = $this -> pagination -> create_links();

				$this -> pagination -> initialize($config);
				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				if (($data['page'] * $config["per_page"]) < $config["total_rows"]) {
					$data['next_rel'] = '<link rel="next" href="'.base_url($slug).'/trang-'.($data['page'] + 1).'.html">';
				}
				if ($data['page'] > 1) {
					$data['prev_rel'] = '<link rel="prev" href="'.base_url($slug).'/trang-'.($data['page'] - 1).'.html">';
				}
				$data['links'] = $this -> pagination -> create_links();

				$data['productsList'] = $this -> products_model -> Get_pagination_product($config["per_page"], $offset, $parent_list, $data['sort'],$parent -> SortingPrice);

				if ($data['productsList']) {

					foreach ($data['productsList'] as $key => $value) {

						$value -> Description = $this->trim_text($value -> Description, 150);

					}

				}

				$breadcrumb_list = $this -> products_model -> Get_breadcrumb($parent -> CategoriesProductsID);

				$breadcrumb_list = array_reverse($breadcrumb_list);

				$this -> breadcrumb -> append_crumb('Trang chủ', base_url());

				foreach ($breadcrumb_list as $bl){

					$this -> breadcrumb -> append_crumb($bl -> Title, base_url() . $bl -> Slug);

				}

				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);

				$data['breadcrumb'] = $this -> breadcrumb -> output();



				$this -> load -> view('guest/main_product1.php', $data);

			} else if($this -> sorting_brand_model -> Get_details($slug)) {
				$data['meta_noindex'] = '<meta name="robots" content="noindex, nofollow, noodp, noarchive" />';
				$data['parent'] = $parent = $this -> sorting_brand_model -> Get_details($slug);

				$parent_list = $this -> sorting_brand_model -> Get_categories_tree($data['parent'] -> SortingBrandID);

				$parent_list[] = $data['parent'] -> SortingBrandID;

				if($parent -> SEOTitle){ $data['SEOTitle'] = $parent -> SEOTitle;}

				else {$data['SEOTitle'] = $parent -> Title;}

				if($parent -> SEOKeyword){ $data['SEOKeyword'] = $parent -> SEOKeyword;}

				if($parent -> SEODescription){ $data['SEODescription'] = $parent -> SEODescription;}

				$this -> load -> library('pagination');

				$config["base_url"] = base_url() . $slug;

				$config["uri_segment"] = 2;

				$config["total_rows"] = $this -> products_model -> Get_pagination_number_by_brand($parent_list);

				$config["per_page"] = $data["per_page"] = 9;

				$config['next_link'] = "sau";

				$config['prev_link'] = "trước";

				$config['last_link'] = 'cuối';

				$config['first_link'] = 'đầu';

				$config['prefix'] = 'trang-';

				// $config['use_page_numbers'] = TRUE;

				$this -> pagination -> initialize($config);

				$data['links'] = $this -> pagination -> create_links();

				$this -> pagination -> initialize($config);
				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				if (($data['page'] * $config["per_page"]) < $config["total_rows"]) {
					$data['next_rel'] = '<link rel="next" href="'.base_url($slug).'/trang-'.($data['page'] + 1).'.html">';
				}
				if ($data['page'] > 1) {
					$data['prev_rel'] = '<link rel="prev" href="'.base_url($slug).'/trang-'.($data['page'] - 1).'.html">';
				}
				$data['productsList'] = $this -> products_model -> Get_pagination_product_by_brand($config["per_page"], $offset, $parent_list);



				if ($data['productsList']) {

					foreach ($data['productsList'] as $key => $value) {

						$value -> Description = $this->trim_text($value -> Description, 150);

					}

				}

				$data['links'] = $this -> pagination -> create_links();

				// $breadcrumb_list = $this -> products_model -> Get_breadcrumb_by_brand($parent -> SortingBrandID);

				// $breadcrumb_list = array_reverse($breadcrumb_list);

				// $this -> breadcrumb -> append_crumb('Trang chủ', base_url());

				// foreach ($breadcrumb_list as $bl){

				// 	$this -> breadcrumb -> append_crumb($bl -> Title, base_url() . $bl -> Slug);

				// }

				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);

				$data['breadcrumb'] = $this -> breadcrumb -> output();



				$this -> load -> view('guest/main_product1.php', $data);

			} else if($this -> sorting_channel_model -> Get_details($slug)) {
				$data['meta_noindex'] = '<meta name="robots" content="noindex, nofollow, noodp, noarchive" />';

				$data['parent'] = $parent = $this -> sorting_channel_model -> Get_details($slug);

				$parent_list = $this -> sorting_channel_model -> Get_categories_tree($data['parent'] -> SortingChannelID);

				$parent_list[] = $data['parent'] -> SortingChannelID;

				if($parent -> SEOTitle){ $data['SEOTitle'] = $parent -> SEOTitle;}

				else {$data['SEOTitle'] = $parent -> Title;}

				if($parent -> SEOKeyword){ $data['SEOKeyword'] = $parent -> SEOKeyword;}

				if($parent -> SEODescription){ $data['SEODescription'] = $parent -> SEODescription;}

				$this -> load -> library('pagination');

				$config["base_url"] = base_url() . $slug;

				$config["uri_segment"] = 2;

				$config["total_rows"] = $this -> products_model -> Get_pagination_number_by_channel($parent_list);

				$config["per_page"] = $data["per_page"] = 9;

				$config['next_link'] = "sau";

				$config['prev_link'] = "trước";

				$config['last_link'] = 'cuối';

				$config['first_link'] = 'đầu';

				$config['prefix'] = 'trang-';

				// $config['use_page_numbers'] = TRUE;

				$this -> pagination -> initialize($config);

				$data['links'] = $this -> pagination -> create_links();

				$this -> pagination -> initialize($config);
				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				if (($data['page'] * $config["per_page"]) < $config["total_rows"]) {
					$data['next_rel'] = '<link rel="next" href="'.base_url($slug).'/trang-'.($data['page'] + 1).'.html">';
				}
				if ($data['page'] > 1) {
					$data['prev_rel'] = '<link rel="prev" href="'.base_url($slug).'/trang-'.($data['page'] - 1).'.html">';
				}
				$data['productsList'] = $this -> products_model -> Get_pagination_product_by_channel($config["per_page"], $offset, $parent_list);


				if ($data['productsList']) {

					foreach ($data['productsList'] as $key => $value) {

						$value -> Description = $this->trim_text($value -> Description, 150);

					}

				}

				$data['links'] = $this -> pagination -> create_links();

				// $breadcrumb_list = $this -> products_model -> Get_breadcrumb_by_brand($parent -> SortingChannelID);

				// $breadcrumb_list = array_reverse($breadcrumb_list);

				// $this -> breadcrumb -> append_crumb('Trang chủ', base_url());

				// foreach ($breadcrumb_list as $bl){

				// 	$this -> breadcrumb -> append_crumb($bl -> Title, base_url() . $bl -> Slug);

				// }

				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);

				$data['breadcrumb'] = $this -> breadcrumb -> output();



				$this -> load -> view('guest/main_product1.php', $data);

			} else if($this -> sorting_price_model -> Get_details($slug)) {
				$data['meta_noindex'] = '<meta name="robots" content="noindex, nofollow, noodp, noarchive" />';

				$data['parent'] = $parent = $this -> sorting_price_model -> Get_details($slug);

				$parent_list = $this -> sorting_price_model -> Get_categories_tree($data['parent'] -> SortingPriceID);

				$parent_list[] = $data['parent'] -> SortingPriceID;

				if($parent -> SEOTitle){ $data['SEOTitle'] = $parent -> SEOTitle;}

				else {$data['SEOTitle'] = $parent -> Title;}

				if($parent -> SEOKeyword){ $data['SEOKeyword'] = $parent -> SEOKeyword;}

				if($parent -> SEODescription){ $data['SEODescription'] = $parent -> SEODescription;}

				$this -> load -> library('pagination');

				$config["base_url"] = base_url() . $slug;

				$config["uri_segment"] = 2;

				$config["total_rows"] = $this -> products_model -> Get_pagination_number_by_price($parent_list);

				$config["per_page"] = $data["per_page"] = 9;

				$config['next_link'] = "sau";

				$config['prev_link'] = "trước";

				$config['last_link'] = 'cuối';

				$config['first_link'] = 'đầu';

				$config['prefix'] = 'trang-';

				// $config['use_page_numbers'] = TRUE;

				$this -> pagination -> initialize($config);

				$data['links'] = $this -> pagination -> create_links();
				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				if (($data['page'] * $config["per_page"]) < $config["total_rows"]) {
					$data['next_rel'] = '<link rel="next" href="'.base_url($slug).'/trang-'.($data['page'] + 1).'.html">';
				}
				if ($data['page'] > 1) {
					$data['prev_rel'] = '<link rel="prev" href="'.base_url($slug).'/trang-'.($data['page'] - 1).'.html">';
				}
				$data['productsList'] = $this -> products_model -> Get_pagination_product_by_price($config["per_page"], $offset, $parent_list);

				if ($data['productsList']) {

					foreach ($data['productsList'] as $key => $value) {

						$value -> Description = $this->trim_text($value -> Description, 150);

					}

				}

				$data['links'] = $this -> pagination -> create_links();

				// $breadcrumb_list = $this -> products_model -> Get_breadcrumb_by_brand($parent -> SortingPriceID);

				// $breadcrumb_list = array_reverse($breadcrumb_list);

				// $this -> breadcrumb -> append_crumb('Trang chủ', base_url());

				// foreach ($breadcrumb_list as $bl){

				// 	$this -> breadcrumb -> append_crumb($bl -> Title, base_url() . $bl -> Slug);

				// }

				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);

				$data['breadcrumb'] = $this -> breadcrumb -> output();



				$this -> load -> view('guest/main_product1.php', $data);

			} else if($this -> sorting_res_model -> Get_details($slug)) {
				$data['meta_noindex'] = '<meta name="robots" content="noindex, nofollow, noodp, noarchive" />';

				$data['parent'] = $parent = $this -> sorting_res_model -> Get_details($slug);

				$parent_list = $this -> sorting_res_model -> Get_categories_tree($data['parent'] -> SortingResID);

				$parent_list[] = $data['parent'] -> SortingResID;



				if($parent -> SEOTitle){ $data['SEOTitle'] = $parent -> SEOTitle;}

				else {$data['SEOTitle'] = $parent -> Title;}

				if($parent -> SEOKeyword){ $data['SEOKeyword'] = $parent -> SEOKeyword;}

				if($parent -> SEODescription){ $data['SEODescription'] = $parent -> SEODescription;}



				// $this -> load -> library('pagination');

				// $config["base_url"] = base_url() . $parent -> Slug;

				// $config["total_rows"] = $this -> products_model -> Get_pagination_number_by_res($parent_list);

				// $config["per_page"] = $data["per_page"] = 8;

				// $config["uri_segment"] = 2;

				// $this -> pagination -> initialize($config);



				$this -> load -> library('pagination');

				$config["base_url"] = base_url() . $slug;

				$config["uri_segment"] = 2;

				$config["total_rows"] = $this -> products_model -> Get_pagination_number_by_res($parent_list);

				$config["per_page"] = $data["per_page"] = 9;

				$config['next_link'] = "sau";

				$config['prev_link'] = "trước";

				$config['last_link'] = 'cuối';

				$config['first_link'] = 'đầu';
				$config['prefix'] = 'trang-';

				// $config['use_page_numbers'] = TRUE;

				$this -> pagination -> initialize($config);

				$data['links'] = $this -> pagination -> create_links();

				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;

				
				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				if (($data['page'] * $config["per_page"]) < $config["total_rows"]) {
					$data['next_rel'] = '<link rel="next" href="'.base_url($slug).'/trang-'.($data['page'] + 1).'.html">';
				}
				if ($data['page'] > 1) {
					$data['prev_rel'] = '<link rel="prev" href="'.base_url($slug).'/trang-'.($data['page'] - 1).'.html">';
				}
				$data['productsList'] = $this -> products_model -> Get_pagination_product_by_res($config["per_page"], $offset, $parent_list);

				if ($data['productsList']) {

					foreach ($data['productsList'] as $key => $value) {

						$value -> Description = $this->trim_text($value -> Description, 150);

					}

				}

				$data['links'] = $this -> pagination -> create_links();

				// $breadcrumb_list = $this -> products_model -> Get_breadcrumb_by_brand($parent -> SortingResID);

				// $breadcrumb_list = array_reverse($breadcrumb_list);

				// $this -> breadcrumb -> append_crumb('Trang chủ', base_url());

				// foreach ($breadcrumb_list as $bl){

				// 	$this -> breadcrumb -> append_crumb($bl -> Title, base_url() . $bl -> Slug);

				// }

				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);

				$data['breadcrumb'] = $this -> breadcrumb -> output();



				$this -> load -> view('guest/main_product1.php', $data);

			} else if($this -> news_model -> Get_details($slug) || $this -> categories_news_model -> Get_details($slug)){

				$this -> news($slug);

			} else {

				$data['product'] = $product = $this -> products_model -> Get_details($slug);

				if(empty($data['product'])) {

					redirect('error-404.html');

				}

				$data['productImage'] = $this -> products_model -> Prd_image_get_all($product -> ProductsID);



				$data['current_category'] = $current_category = $this -> categories_product_model -> Get_details_by_id($product -> CategoriesProductsID);

				// $data['brand'] = $brand = $this -> sorting_brand_model -> Get_details_by_id($product -> SortingBrandID);



				if($product -> SEOTitle){ $data['SEOTitle'] = $product -> SEOTitle;}

				else {$data['SEOTitle'] = $product -> Title;}

				if($product -> SEOKeyword){ $data['SEOKeyword'] = $product -> SEOKeyword;}

				if($product -> SEODescription){ $data['SEODescription'] = $product -> SEODescription;}

					

				$this -> breadcrumb -> append_crumb('Trang chủ', base_url());

				$breadcrumb_list = $this -> products_model -> Get_breadcrumb($product -> CategoriesProductsID);

				$breadcrumb_list = array_reverse($breadcrumb_list);

				foreach ($breadcrumb_list as $bl){

					$this -> breadcrumb -> append_crumb($bl -> Title, base_url() . $bl -> Slug);

				}

				$this -> breadcrumb -> append_crumb($product -> Title, base_url() . $product -> Slug);

				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);

				$data['signature'] = $this -> news_model -> News_get_by_cate_id(4);
				$data['trend'] = $this -> news_model -> News_get_by_cate_id(3);

				// $data['hightlight'] = $this -> products_model -> Get_hightlight($product -> Hightlight);

				$data['tags'] = $this -> products_model -> get_product_tags($product -> Tags);

				$data['relative'] = $this -> products_model -> Get_relative($current_category -> CategoriesProductsID, $product -> ProductsID);

				if ($data['relative']) {

					$data['relative'] = array_chunk($data['relative'], 4);

				}


				// $data['relative_brand'] = $this -> products_model -> Get_relative_by_brand($brand -> SortingBrandID, $product -> ProductsID);

				$data['breadcrumb'] = $this -> breadcrumb -> output();

				$this -> load -> view('guest/main_product2.php', $data);

			}

		}



		function news($slug = ""){

			global $lang;

			$data = $this -> main_model -> general();

			$data['news_cate'] = $this -> categories_news_model -> Get_main_categories();

			

			if(!$slug){

				redirect('error-404.html');

			} else if ($this -> categories_news_model -> Get_details($slug)) {

				$data['signature'] = $this -> news_model -> News_get_by_cate_id(4);
				$data['trend'] = $this -> news_model -> News_get_by_cate_id(3);

				$data['parent'] = $parent = $this -> categories_news_model -> Get_details($slug);

				$parent_list = $this -> categories_news_model -> Get_categories_tree($data['parent'] -> CategoriesNewsID);

				$parent_list[] = $data['parent'] -> CategoriesNewsID;

				$data['news'] = new StdClass();

				$data['news'] -> Slug = 0;



				if($parent -> SEOTitle){ $data['SEOTitle'] = $parent -> SEOTitle;}

				else {$data['SEOTitle'] = $parent -> Title;}

				if($parent -> SEOKeyword){ $data['SEOKeyword'] = $parent -> SEOKeyword;}

				if($parent -> SEODescription){ $data['SEODescription'] = $parent -> SEODescription;}



				$this -> load -> library('pagination');

				$config["base_url"] = base_url() . $parent -> Slug;

				$config["total_rows"] = $this -> news_model -> Get_pagination_number($parent_list);

				$config["per_page"] = $data["per_page"] = 9;

				$config["uri_segment"] = 2;

				// $config['page_query_string'] = TRUE;

				// $config['query_string_segment'] = 'trang';

				// $config["enable_query_strings"] = TRUE;
				$config['prefix'] = 'trang-';
				$this -> pagination -> initialize($config);
				$data['page'] = ($this -> uri -> segment(2)) ? (int)str_replace(array('trang-', '.html'), "", $this -> uri -> segment(2)) : 1;
				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				$data['newsList'] = $this -> news_model -> Get_pagination_news($config["per_page"], $offset, $parent_list);

				if ($data['newsList']) {
					foreach ($data['newsList'] as $key => $value) {
						$value -> Body = $this->trim_text($value -> Body, 650);
					}
				}

				$data['links'] = $this -> pagination -> create_links();

				$breadcrumb_list = $this -> categories_news_model -> Get_breadcrumb($parent -> CategoriesNewsID);

				$breadcrumb_list = array_reverse($breadcrumb_list);

				$this -> breadcrumb -> append_crumb('Trang chủ', base_url());

				foreach ($breadcrumb_list as $bl){

					$this -> breadcrumb -> append_crumb($bl -> Title, base_url() . $bl -> Slug);

				}

				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);


				$data['breadcrumb'] = $this -> breadcrumb -> output();

				$data['menu'] = $this -> menu_model -> Menu_get_all($slug);



				$this -> load -> view('guest/main_news1.php', $data);

			} else {

				$data['signature'] = $this -> news_model -> News_get_by_cate_id(4);
				$data['trend'] = $this -> news_model -> News_get_by_cate_id(3);

				$data['news'] = $news = $this -> news_model -> Get_details($slug);

				if(empty($data['news'])) {

					redirect('error-404.html');

				}

				$data['parent'] = $parent = $this -> categories_news_model -> Get_details_by_id($news -> CategoriesNewsID);

				// $data['news_hightlight'] = $this -> news_model -> get_news_hightlight($news -> Hightlight);

				$data['news_tag'] = $this -> news_model -> get_news_tags($news -> Tags);



				if($news -> SEOTitle){ $data['SEOTitle'] = $news -> SEOTitle;}

				else {$data['SEOTitle'] = $news -> Title;}

				if($news -> SEOKeyword){ $data['SEOKeyword'] = $news -> SEOKeyword;}

				if($news -> SEODescription){ $data['SEODescription'] = $news -> SEODescription;}



				$this -> breadcrumb -> append_crumb("Trang chủ", base_url());

				$breadcrumb_list = $this -> categories_news_model -> Get_breadcrumb($news -> CategoriesNewsID);

				$breadcrumb_list = array_reverse($breadcrumb_list);

				foreach ($breadcrumb_list as $bl){

					$this -> breadcrumb -> append_crumb($bl -> Title, base_url() . $bl -> Slug);

				}
				$this -> breadcrumb -> append_crumb($news -> Title, base_url() . $news -> Slug);

				$data['breadcrumb'] = $this -> breadcrumb -> output();

				$data['static_news'] = $this -> news_model -> Get_details_by_id(54);

				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);

				$data['relative'] = $this -> news_model -> Get_relative($parent -> CategoriesNewsID);

				$data['menu'] = $this -> menu_model -> Menu_get_all($slug);

				$this -> load -> view('guest/main_news2.php', $data);

			}

		}



		function news_tags($tags){

			global $lang;

			$data = $this -> main_model -> general();

			$data['news_cate'] = $this -> categories_news_model -> Get_main_categories();

			if(!$tags){

				redirect('error-404.html');

			} else {

				$data['tag'] = $tag = $this -> news_model -> Get_tag_details($tags);



				if($tag -> SEOTitle){ $data['SEOTitle'] = $tag -> SEOTitle;}

				else {$data['SEOTitle'] = $tag -> Title;}

				if($tag -> SEOKeyword){ $data['SEOKeyword'] = $tag -> SEOKeyword;}

				if($tag -> SEODescription){ $data['SEODescription'] = $tag -> SEODescription;}



				$this -> load -> library('pagination');

				$config["base_url"] = base_url() . 'tag-tin-tuc/' . $tags;

				$config["total_rows"] = $this -> news_model -> Get_tag_pagination_number($tag -> TagsID);

				$config["per_page"] = $data["per_page"] = 9;

				$config["uri_segment"] = 3;

				$this -> pagination -> initialize($config);

						

				$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				$data['newsList'] = $this -> news_model -> Get_tag_pagination_news($config["per_page"], $offset, $tag -> TagsID);

				$data['links'] = $this -> pagination -> create_links();



				$this -> breadcrumb -> append_crumb("Trang chủ", base_url());

				$this -> breadcrumb -> append_crumb("Tags: " . $tag -> Title, base_url() ."tag-tin-tuc/". $tag -> Slug);

				$data['breadcrumb'] = $this -> breadcrumb -> output();



				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);



				$this -> load -> view('guest/main_tag_news.php', $data);

			}

		}



		function search(){

			global $lang;

			$data = $this -> main_model -> general();


			$data['SEOTitle'] = str_replace("[keyword]", $_GET['t'], $data['seo']['SEOTitleSearch']);
			$data['SEOKeyword'] = str_replace("[keyword]", $_GET['t'], $data['seo']['SEOKeywordSearch']);
			$data['SEODescription'] = str_replace("[keyword]", $_GET['t'], $data['seo']['SEODescriptionSearch']);

			$option = array();

			if ($this->input->get('t')) {

				$option['t'] = $this->input->get('t');

			} else {$option['t'] ="";}

			if ($this->input->get('dien-tich')) {

				$option['dien-tich'] = $this->input->get('dien-tich');

			}else {$option['dien-tich'] ="";}

			if ($this->input->get('phong')) {

				$option['phong'] = $this->input->get('phong');

			}else {$option['phong'] ="";}

			if ($this->input->get('mausac')) {

				$option['mausac'] = $this->input->get('mausac');

			}else {$option['mausac'] ="";}

			if ($this->input->get('phong-cach')) {

				$option['phong-cach'] = $this->input->get('phong-cach');

			}else {$option['phong-cach'] ="";}

			$this -> load -> library('pagination');

			$temp_trang = $_GET;

			unset($temp_trang['trang']);

			$data['current_query_trang'] = http_build_query($temp_trang);

			$this -> load -> library('pagination');
			
			$temp_trang = $_GET;
			unset($temp_trang['trang']);
			$data['current_query_trang'] = http_build_query($temp_trang);
			$config["base_url"] = base_url() . 'tim-kiem'.'?'. $data['current_query_trang'];

			$config["total_rows"] = $this -> products_model -> Get_search_pagination_number($option);
			$config["per_page"] = $data["per_page"] = 9;
			$config["uri_segment"] = 2;

			$config['enable_query_strings'] = TRUE;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'trang';
			$this -> pagination -> initialize($config);

			$data['links'] = $this -> pagination -> create_links();
			$data['page'] = ($this -> input -> get('trang')) ? (int)($this -> input -> get('trang')) : 1;

// var_dump($temp_trang);
// var_dump($data['page']);
// var_dump($config['base_url']);

			$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

			$data['productsList'] = $this -> products_model -> Get_search_pagination_products($config["per_page"], $offset, $option);

			if ($data['productsList']) {

				foreach ($data['productsList'] as $key => $value) {

					$value -> Description = $this->trim_text($value -> Description, 150);

				}

			}

			$data['links'] = $this -> pagination -> create_links();

			$this -> breadcrumb -> append_crumb("Trang chủ", base_url());

			$this -> breadcrumb -> append_crumb("Tìm kiếm sản phẩm", $config['base_url']);



			$data['breadcrumb'] = $this -> breadcrumb -> output();

			// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

			// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);



			$this -> load -> view('guest/main_search.php', $data);

		}



		function products_tags($tags){

			global $lang;

			$data = $this -> main_model -> general();



			if(!$tags){

				redirect('error-404.html');

			} else {

				$data['tag'] = $tag = $this -> products_model -> Get_tag_details($tags);



				if($tag -> SEOTitle){ $data['SEOTitle'] = $tag -> SEOTitle;}

				else {$data['SEOTitle'] = $tag -> Title;}

				if($tag -> SEOKeyword){ $data['SEOKeyword'] = $tag -> SEOKeyword;}

				if($tag -> SEODescription){ $data['SEODescription'] = $tag -> SEODescription;}



				$this -> load -> library('pagination');

				$config["base_url"] = base_url() . 'tag-san-pham/' . $tags;

				$config["total_rows"] = $this -> products_model -> Get_tag_pagination_number($tag -> TagsID);

				$config["per_page"] = $data["per_page"] = 9;

				$config["uri_segment"] = 3;

				$this -> pagination -> initialize($config);

						

				$data['page'] = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 1;

				$offset = ($data['page'] * $config['per_page']) - $config['per_page'];

				$data['productsList'] = $this -> products_model -> Get_tag_pagination_products($config["per_page"], $offset, $tag -> TagsID);

				$data['links'] = $this -> pagination -> create_links();



				$this -> breadcrumb -> append_crumb("Trang chủ", base_url());

				$this -> breadcrumb -> append_crumb("Tags: " . $tag -> Title, base_url() ."tag-san-pham/". $tag -> Slug);

				$data['breadcrumb'] = $this -> breadcrumb -> output();



				// $data['SellerProducts'] = $this -> products_model -> Get_seller_products(6);

				// $data['latest_news'] = $this -> news_model -> Get_latest_news(3);



				$this -> load -> view('guest/main_tag_products.php', $data);

			}

		}

		function cam_on() {

			$data = $this -> main_model -> general();

			$this -> form_validation -> set_rules('fullname','Tên khách hàng','trim|required',array('required' => '%s không được để trống'));
			$this -> form_validation -> set_rules('phone','Số điện thoại khách hàng','trim|required',array('required' => '%s không được để trống'));

			$this -> form_validation -> set_error_delimiters('<span class="error">', '</span>');

			if($this -> form_validation -> run()) {
				$this -> load -> model('ajaxhandle/ajax_support_online_model');
				$result = $this -> ajax_support_online_model -> insertSubscribe();
				if ($result) {

					$data['message'] = 'Cám ơn bạn đã gửi thông tin đăng ký, nhân viên tư vấn của vivadecor sẽ liên hệ với bạn ngay.';
				}else 
					$data['message'] = 'Gửi thông tin liên hệ thất bại';
				$this->load->view('cam-on', $data);

			}else
				redirect(base_url());


		}





		function trim_text($input, $length, $ellipses = true, $strip_tag = true,$strip_style = true) {

			//strip tags, if desired

			if ($strip_tag) {

				$input = strip_tags($input);

			}

			//strip tags, if desired

			if ($strip_style) {

				$input = preg_replace('/(<[^>]+) style=".*?"/i', '$1',$input);

			}

			if($length=='full') {

				$trimmed_text=$input;

			}

			else {

				//no need to trim, already shorter than trim length

				if (strlen($input) <= $length) {

				return $input;

				}

				//find last space within length

				$last_space = strrpos(substr($input, 0, $length), ' ');

				$trimmed_text = substr($input, 0, $last_space);

				//add ellipses (...)

				if ($ellipses) {

				$trimmed_text .= '...';

				}

			}

			return $trimmed_text;

		}



		function sitemap() {

			// header("Content-Type: text/xml;charset=iso-8859-1");

			// $this->load->view("call-us",$data);

			header("Content-type: text/xml");

			$xml_file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/sitemap.xml");

			echo $xml_file;

		}

		function sitemap_index() {

			// header("Content-Type: text/xml;charset=iso-8859-1");

			// $this->load->view("call-us",$data);

			header("Content-type: text/xml");

			$xml_file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/sitemap_index.xml");

			echo $xml_file;

		}

		function sitemap_category() {

			// header("Content-Type: text/xml;charset=iso-8859-1");

			// $this->load->view("call-us",$data);

			header("Content-type: text/xml");

			$xml_file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/sitemap_category.xml");

			echo $xml_file;

		}

		function sitemap_product() {

			// header("Content-Type: text/xml;charset=iso-8859-1");

			// $this->load->view("call-us",$data);

			header("Content-type: text/xml");

			$xml_file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/sitemap_product.xml");

			echo $xml_file;

		}

		function sitemap_news() {

			// header("Content-Type: text/xml;charset=iso-8859-1");

			// $this->load->view("call-us",$data);

			header("Content-type: text/xml");

			$xml_file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/sitemap_news.xml");

			echo $xml_file;

		}

		function sitemap_image() {

			// header("Content-Type: text/xml;charset=iso-8859-1");

			// $this->load->view("call-us",$data);

			header("Content-type: text/xml");

			$xml_file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/sitemap_image.xml");

			echo $xml_file;

		}

	}

?>