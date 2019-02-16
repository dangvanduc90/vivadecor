<?php

	class Main_model extends Cms_Base_model {

		function __construct() {

			parent::__construct();

		}



		public function general() {

			global $data;

			global $lang;

			$data['current_lang'] = $this -> lang -> mci_current();

			$data['current_url'] = $this -> getUrl();

			$data['current_function'] = $this -> router -> fetch_method();

			$this -> lang -> load('main');

			$this -> load -> model('logo_model');

			$this -> load -> model('favicon_model');

			$this -> load -> model('webinfor_model');

			$this -> load -> model('seo_default_model');

			// $this -> load -> model('seo_link_model');

			$this -> load -> model('banner_model');

			$this -> load -> model('menu_model');

			$this -> load -> model('support_online_model');

			$this -> load -> model('categories_product_model');

			$this -> load -> model('sorting_brand_model');

			$this -> load -> model('sorting_res_model');

			$this -> load -> model('sorting_price_model');

			$this -> load -> model('sorting_channel_model');

			$this -> load -> model('categories_news_model');

			$this -> load -> model('news_model');

			$this -> load -> model('products_model');

			$this -> load -> model('footer_model');

			//$this -> load -> model('testimonials_model');

			$this -> load -> model('ads_model');

			$data['lang'] = $lang;

			$data['color'] = $this -> sorting_brand_model -> Category_get_all_for_menu();

			$data['stylelist'] = $this -> sorting_res_model -> Category_get_all_for_menu();

			$data['acreage'] = $this -> sorting_price_model -> Category_get_all_for_menu();

			$data['room'] = $this -> sorting_channel_model -> Category_get_all_for_menu();

			$data['color_under'] = $this -> sorting_brand_model -> Category_get_all_for_search();

			$data['stylelist_under'] = $this -> sorting_res_model -> Category_get_all_for_search();

			$data['acreage_under'] = $this -> sorting_price_model -> Category_get_all_for_search();

			$data['room_under'] = $this -> sorting_channel_model -> Category_get_all_for_search();

			$data['menu'] = $this -> menu_model -> Menu_get_all();
// var_dump($data['menu']);die();
			$data['record'] = $record = $this -> products_model -> Get_hot_pagination_number();
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

			$data['hotProductsList'] = $this -> products_model -> Get_hot_pagination_product($display, $offset);

			if ($data['hotProductsList']) {

				foreach ($data['hotProductsList'] as $key => $value) {

					$value -> Description = $this->trim_text($value -> Description, 80);

				}

			}

			$data['menuResponsive'] = $this -> menu_model -> MenuResponsive_get_all();

			$data['hotline'] = $this -> support_online_model -> Get_All_Hotline();

			// $data['support_online'] = $this -> support_online_model -> Get_All_Support_Online();

			$hot_news = $this -> news_model -> Get_hot();

			$data['hot_news'] = $hot_news{0};

			if ($data['hot_news']) {
					$data['hot_news'] -> Body = $this->trim_text($data['hot_news'] -> Body, 1000);
			}

			$data['banners'] = $this -> banner_model -> Banner_get_all();

			$data['footers'] = $this -> footer_model -> Footer_get_all();

			// $data['seo_link'] = $this -> seo_link_model -> Get_All_SEO_Link();

            // $data['mobile_banners'] = $this -> ads_model -> Ads_get_for_show(9);

			$data['logo'] = $this -> logo_model -> Logo_get();

			$data['cart_counter'] = 0;

			if($this->cart->contents()){

				$data['cart_counter'] = $this->cart->total_items();

			}

			$data['message'] = "";

			$favicon = $this -> favicon_model -> Favicon_get();

					($favicon !== false && (count($favicon) > 0)) ? $data['favicon'] = $favicon['IconURL'] : $data['favicon'] = "";


			$data['seo'] = $seo = $this -> seo_default_model -> Get_seo_default();

			((count($seo) > 0) && $seo['SEOTitle'] ) ? $data['SEOTitle'] = $seo['SEOTitle'] : $data['SEOTitle'] = "Default";

			((count($seo) > 0) && $seo['SEOKeyword'] ) ? $data['SEOKeyword'] = $seo['SEOKeyword'] : $data['SEOKeyword'] = "Default";

			((count($seo) > 0) && $seo['SEODescription'] ) ? $data['SEODescription'] = $seo['SEODescription'] : $data['SEODescription'] = "Default";

			return $data;

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


	}

?>