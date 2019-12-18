<?php
	class Admin_ajaxhandler extends CMS_AdminController {
		function __construct(){
			parent::__construct();
		}
		public function testForm(){
			//echo '<pre>'.print_r($_POST['CheckProducts'], true).'</pre>';
			$this -> input -> post('Chk') ? $CheckProducts = $this -> input -> post('Chk') : $CheckProducts = array();
			echo json_encode($CheckProducts);
		}
		public function Upload_file($element_name = false) {
			$data = $this -> Upload_Docs_File(false,$element_name);
			echo json_encode(array('url' => $data['url_file'],'file_name' => $data['file_name'], 'msg' => $data['message']));
		}
		public function deleteSubscribe() {
			$this -> load -> model('administrator/subscribe_model');
			$this -> input -> post('Id') ? $Id = $this -> input -> post('Id') : $Id = 0;
			$result = $this -> subscribe_model -> delete($Id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function deleteCurrentImg() {
		}
		public function Delete_products_rating() {
			$this -> load -> model('administrator/products_model');
			$this -> input -> post('id') ? $id = $this -> input -> post('id') : $id = null;
			if($this -> products_model -> Products_rating_delete($id)){
				echo json_encode('1');
			}else {
				echo json_encode('0');
			}
		}

		/************* Cac method thao tac voi products
***************************************************************************************/
		public function Delete_products_chk() {
		}
		public function Delete_products() {
			$this -> load -> model('administrator/products_model');
			$id = $this -> input -> post('id');
			$result = $this -> products_model -> Products_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}

/************* Ket thuc cac method thao tac voi products
***************************************************************************************/

		/************* Cac method thao tac voi categories products
***************************************************************************************/
		public function Upload_images_categories_product() {
			$data = $this -> Upload_Single_Image('danh-muc-san-pham');
			echo json_encode(array('url' => $data['url_thumbs'],'imgname' => $data['file_name'], 'msg' => $data['message']));
		}
		public function Delete_categories_product() {
			$this -> load -> model('administrator/categories_product_model');
			$id = $this -> input -> post('id');
			$result = $this -> categories_product_model -> Category_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* ket thuc thao tac voi categories products
***************************************************************************************/
/************* Cac method thao tac voi categories brand
***************************************************************************************/
		public function Upload_images_sorting_brand() {
			$data = $this -> Upload_Single_Image('danh-muc-hang-san-xuat');
			echo json_encode(array('url' => $data['url_thumbs'],'imgname' => $data['file_name'], 'msg' => $data['message']));
		}
		public function Delete_sorting_brand() {
			$this -> load -> model('administrator/sorting_brand_model');
			$id = $this -> input -> post('id');
			$result = $this -> sorting_brand_model -> Category_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* ket thuc thao tac voi categories brand
***************************************************************************************/
/************* Cac method thao tac voi categories res
***************************************************************************************/
		public function Upload_images_sorting_res() {
			$data = $this -> Upload_Single_Image('danh-muc-do-phan-giai');
			echo json_encode(array('url' => $data['url_thumbs'],'imgname' => $data['file_name'], 'msg' => $data['message']));
		}
		public function Delete_sorting_res() {
			$this -> load -> model('administrator/sorting_res_model');
			$id = $this -> input -> post('id');
			$result = $this -> sorting_res_model -> Category_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* ket thuc thao tac voi categories res
***************************************************************************************/
/************* Cac method thao tac voi categories channel
***************************************************************************************/
		public function Upload_images_sorting_channel() {
			$data = $this -> Upload_Single_Image('danh-muc-so-kenh');
			echo json_encode(array('url' => $data['url_thumbs'],'imgname' => $data['file_name'], 'msg' => $data['message']));
		}
		public function Delete_sorting_channel() {
			$this -> load -> model('administrator/sorting_channel_model');
			$id = $this -> input -> post('id');
			$result = $this -> sorting_channel_model -> Category_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* ket thuc thao tac voi categories channel
***************************************************************************************/
		/************* Cac method thao tac voi categories news
***************************************************************************************/
		public function Delete_categories_news() {
			$this -> load -> model('administrator/categories_news_model');
			$id = $this -> input -> post('id');
			$result = $this -> categories_news_model -> Categoriesnews_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* ket thuc thao tac voi categories news
***************************************************************************************/

		/************* Cac method thao tac voi news
***************************************************************************************/
		public function Delete_news_chk() {
			$this -> load -> model('administrator/news_model');
			$this -> input -> post('Chk') ? $checkRows = $this -> input -> post('Chk') : $checkRows = 0;
			$arrayDeleted = array();
			if(!empty($checkRows)) {
				foreach ($checkRows as $newsId) {
					$result = $this -> news_model -> News_delete($newsId);
					if($result) {
						$arrayDeleted[] = $newsId;
					}
				}
			}
			echo json_encode(array("array" => $arrayDeleted,"msg" => "Đã xóa các bản ghi vĩnh viễn!"));
		}
		public function Trash_news_chk() {
			$this -> load -> model('administrator/news_model');
			$this -> input -> post('Chk') ? $checkRows = $this -> input -> post('Chk') : $checkRows = 0;
			$arrayDeleted = array();
			if(!empty($checkRows)) {
				foreach ($checkRows as $newsId) {
					$result = $this -> news_model -> News_trash($newsId);
					if($result) {
						$arrayDeleted[] = $newsId;
					}
				}
			}
			echo json_encode(array("array" => $arrayDeleted,"msg" => "Đã lưu các bản ghi vào bộ nhớ tạm!"));
		}
		public function Restore_news_chk() {
			$this -> load -> model('administrator/news_model');
			$this -> input -> post('Chk') ? $checkRows = $this -> input -> post('Chk') : $checkRows = 0;
			$arrayDeleted = array();
			if(!empty($checkRows)) {
				foreach ($checkRows as $newsId) {
					$result = $this -> news_model -> News_restore($newsId);
					if($result) {
						$arrayDeleted[] = $newsId;
					}
				}
			}
			echo json_encode(array("array" => $arrayDeleted,"msg" => "Khôi phục thành công!"));
		}
		public function Delete_news() {
			$this -> load -> model('administrator/news_model');
			$id = $this -> input -> post('id');
			$result = $this -> news_model -> News_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi news
***************************************************************************************/
		/************* Cac method thao tac voi Hotline
***************************************************************************************/
		public function Delete_hotline() {
			$this -> load -> model('administrator/hotline_model');
			$id = $this -> input -> post('id');
			$result = $this -> hotline_model -> Hotline_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_Orders_Hotline() {
			$this -> load -> model('administrator/hotline_model');
			$id = $this -> input -> post('id');
			$result = $this -> hotline_model -> Hotline_update_order($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_Publish_Hotline() {
			$this -> load -> model('administrator/hotline_model');
			$id = $this -> input -> post('id');
			$result = $this -> hotline_model -> Hotline_update_publish($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi Hotline
***************************************************************************************/
/************* Cac method thao tac voi Partners
***************************************************************************************/
		public function Delete_partners() {
			$this -> load -> model('administrator/partners_model');
			$id = $this -> input -> post('id');
			$result = $this -> partners_model -> delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_Orders_Partners() {
			$this -> load -> model('administrator/partners_model');
			$id = $this -> input -> post('id');
			$result = $this -> partners_model -> updateOrders($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi Partners
***************************************************************************************/
		/************* Ket thuc thao tac voi Support Online
***************************************************************************************/
		public function Delete_support() {
			$this -> load -> model('administrator/support_online_model');
			$id = $this -> input -> post('id');
			$result = $this -> support_online_model -> Delete_support($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi Support Online
***************************************************************************************/

		/************* Ket thuc thao tac voi Menu
***************************************************************************************/
		public function Delete_menu() {
			$this -> load -> model('administrator/menu_model');
			$id = $this -> input -> post('id');
			$result = $this -> menu_model -> Menu_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi Menu
***************************************************************************************/
		/************* Ket thuc thao tac voi Menu
***************************************************************************************/
		public function Delete_menu_hot() {
			$this -> load -> model('administrator/menu_hot_model');
			$id = $this -> input -> post('id');
			$result = $this -> menu_hot_model -> Menu_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi Menu
***************************************************************************************/
		/************* Cac method thao tac voi Orders
***************************************************************************************/
		public function Update_orders_status() {
			$this -> load -> model('ajax_orders_model');
			$result = $this -> ajax_orders_model -> Ajax_Update_Status();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_orders_payments() {
			$this -> load -> model('ajax_orders_model');
			$result = $this -> ajax_orders_model -> Ajax_update_payments();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Delete_orders() {
			$this -> load -> model('ajax_orders_model');
			$result = $this -> ajax_orders_model -> Ajax_delete();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi Orders
***************************************************************************************/

		/************* Cac method thao tac voi Logo
***************************************************************************************/
		
        public function Logo_Upload($element_name = false) {
            $element_name == false ? $data = $this -> Upload_Single_Image('logo') : $data = $this -> Upload_Single_Image('logo', false, false, $element_name);
            echo json_encode(array('url' => $data['url_thumbs'],'imgname' => $data['file_name'], 'msg' => $data['message']));
        }
		public function Update_main_logo() {
			$this -> load -> model('ajax_logo_model');
			$result = $this -> ajax_logo_model -> Ajax_update_main_logo();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Delete_logo() {
			$this -> load -> model('ajax_logo_model');
			$result = $this -> ajax_logo_model -> Ajax_delete_logo();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi Logo
***************************************************************************************/

		/************* Cac method thao tac voi Ads
***************************************************************************************/
		public function Ads_uploas_image() {
			$data = $this -> Upload_Single_Image('quang-cao');
			echo json_encode(array('url' => $data['url_thumbs'],'imgname' => $data['file_name'], 'msg' => $data['message']));
		}
		public function Update_ads_height() {
			$this -> load -> model('ajax_ads_model');
			$result = $this -> ajax_ads_model -> Ajax_update_height();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_ads_width() {
			$this -> load -> model('ajax_ads_model');
			$result = $this -> ajax_ads_model -> Ajax_update_width();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_ads_orders() {
			$this -> load -> model('ajax_ads_model');
			$result = $this -> ajax_ads_model -> Ajax_update_orders();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_ads_publish() {
			$this -> load -> model('ajax_ads_model');
			$result = $this -> ajax_ads_model -> Ajax_update_publish();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Delete_ads() {
			$this -> load -> model('ajax_ads_model');
			$result = $this -> ajax_ads_model -> Ajax_delete();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi Ads
***************************************************************************************/

		/************* Cac method thao tac voi Ads_groups
***************************************************************************************/
		public function Delete_ads_groups() {
			$this -> load -> model('administrator/ads_groups_model');
			$id = $this -> input -> post('id');
			$result = $this -> ads_groups_model -> Ads_groups_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* Ket thuc thao tac voi Ads_groups
***************************************************************************************/

		/************* Cac method thao tac voi Favicons
***************************************************************************************/
		public function Favicons_upload_image() {
			/***
			**** Co 2 tham so chuyen vao la max_height,max_width cho phep anh duoc upload len
			******************************/
			$data = $this -> Upload_Single_Image('favicon',32,32);
			echo json_encode(array('url' => $data['url_thumbs'],'imgname' => $data['file_name'], 'msg' => $data['message']));
		}
		public function Update_main_favicon() {
			$this -> load -> model('ajax_favicon_model');
			$result = $this -> ajax_favicon_model -> Ajax_update_main_favicon();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Delete_favicon() {
			$this -> load -> model('administrator/favicon_model');
			$id = $this -> input -> post('id');
			$result = $this -> favicon_model -> Favi_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		/************* ket thuc thao tac voi Favicons
***************************************************************************************/

		/************* Cac method thao tac voi Banner
***************************************************************************************/
		public function Banner_upload_image() {
			$data = $this -> Upload_Single_Image('banner');
			echo json_encode(array('url' => $data['url_thumbs'],'imgname' => $data['file_name'], 'msg' => $data['message']));
		}
		public function Update_orders_banner() {
			$this -> load -> model('administrator/banner_model');
			$result = $this -> banner_model -> Banner_update_orders();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_publish_banner() {
			$this -> load -> model('administrator/banner_model');
			$result = $this -> banner_model -> Banner_update_publish();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Delete_banner() {
			$this -> load -> model('administrator/banner_model');
			$id = $this -> input -> post('id');
			$result = $this -> banner_model -> Banner_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		/************* ket thuc thao tac voi banner
***************************************************************************************/
		/************* Cac method thao tac voi Section
***************************************************************************************/
		public function Update_orders_section() {
			$this -> load -> model('administrator/section_model');
			$result = $this -> section_model -> Section_update_orders();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_publish_section() {
			$this -> load -> model('administrator/section_model');
			$result = $this -> section_model -> Section_update_publish();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Delete_section() {
			$this -> load -> model('administrator/section_model');
			$id = $this -> input -> post('id');
			$result = $this -> section_model -> Section_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		/************* ket thuc thao tac voi section
***************************************************************************************/
		/************* Cac method thao tac voi Footer
***************************************************************************************/
		public function Footer_upload_image() {
			$data = $this -> Upload_Single_Image('footer');
			echo json_encode(array('url' => $data['url_thumbs'],'imgname' => $data['file_name'], 'msg' => $data['message']));
		}
		public function Update_orders_footer() {
			$this -> load -> model('administrator/footer_model');
			$result = $this -> footer_model -> Footer_update_orders();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Update_publish_footer() {
			$this -> load -> model('administrator/footer_model');
			$result = $this -> footer_model -> Footer_update_publish();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Delete_footer() {
			$this -> load -> model('administrator/footer_model');
			$id = $this -> input -> post('id');
			$result = $this -> footer_model -> Footer_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		/************* ket thuc thao tac voi footer
***************************************************************************************/
		/************* Cac method thao tac voi Plugins
***************************************************************************************/
		public function updatePublishPlugins() {
			$this -> load -> model('administrator/plugins_model');
			$result = $this -> plugins_model -> updatePublish();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function updateOrdersPlugins() {
			$this -> load -> model('administrator/plugins_model');
			$result = $this -> plugins_model -> updateOrders();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function deletePlugins() {
			$this -> load -> model('administrator/plugins_model');
			$this -> input -> post('id') ? $id = $this -> input -> post('id') : $id = "";
			$result = $this -> plugins_model -> delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		/************* ket thuc Cac method thao tac voi Plugins
***************************************************************************************/

		/************* Cac method thao tac voi TAGS
***************************************************************************************/
		public function Delete_news_tags() {
			$this -> load -> model('administrator/news_tags_model');
			$this -> input -> post('id') ? $id = $this -> input -> post('id') : $id = "";
			$result = $this -> news_tags_model -> Tags_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Delete_products_tags() {
			$this -> load -> model('administrator/products_tags_model');
			$this -> input -> post('id') ? $id = $this -> input -> post('id') : $id = "";
			$result = $this -> products_tags_model -> Tags_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}

		/************* ket thuc Cac method thao tac voi tags
***************************************************************************************/
/************* Cac method thao tac voi EVENTS LINE
***************************************************************************************/
		public function deleteEventsLine() {
			$this -> load -> model('administrator/events_line_model');
			$this -> input -> post('id') ? $id = $this -> input -> post('id') : $id = "";
			$result = $this -> events_line_model -> delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function getEventsLineByName() {
			$this -> load -> model('administrator/events_line_model');
			$this -> input -> post('eventsLineName') ? $eventsLineName = $this -> input -> post('eventsLineName') : $eventsLineName = "";
			$result = $this -> events_line_model -> getByName('%'.$eventsLineName.'%');
			echo json_encode($result);
		}

		/************* ket thuc Cac method thao tac voi EVENTS LINE
***************************************************************************************/
		public function Delete_contact() {
			$this -> load -> model('administrator/contact_model');
			$id = $this -> input -> post('id');
			$result = $this -> contact_model -> contact_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function Delete_callus() {
			$this -> load -> model('administrator/callus_model');
			$id = $this -> input -> post('id');
			$result = $this -> callus_model -> delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		/************* Cac method thao tac voi PARTNERS
***************************************************************************************/

		public function Update_partners_publish() {
			$this -> load -> model('administrator/partners_model');
			$result = $this -> partners_model -> updatePublish();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}

		/************* ket thuc Cac method thao tac voi PARTNERS
***************************************************************************************/

		/************* Cac method thao tac voi TESTIMONIALS
***************************************************************************************/

		public function updateTestimonialsPublish() {
			$this -> load -> model('administrator/testimonials_model');
			$result = $this -> testimonials_model -> updatePublish();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function updateTestimonialsOrders() {
			$this -> load -> model('administrator/testimonials_model');
			$result = $this -> testimonials_model -> updateOrders();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function deleteTestimonial() {
			$this -> load -> model('administrator/testimonials_model');
			$this -> input -> post('Id') ? $Id = $this -> input -> post('Id') : $Id = 0;
			$result = $this -> testimonials_model -> delete($Id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}

		/************* ket thuc Cac method thao tac voi TESTIMONIALS
***************************************************************************************/
	
		/************* Cac method thao tac voi sorting price
***************************************************************************************/
		public function Delete_sorting_price() {
			$this -> load -> model('administrator/sorting_price_model');
			$id = $this -> input -> post('id');
			$result = $this -> sorting_price_model -> Category_delete($id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
/************* ket thuc thao tac voi sorting price
***************************************************************************************/

		/************* Cac method thao tac voi COMMENT
***************************************************************************************/
		public function updateCommentPublish() {
		   $this -> load -> model('administrator/comment_model');
			$this -> input -> post('Id') ? $Id = $this -> input -> post('Id') : $Id = 0;
			$Publish = $this -> input -> post('Publish');
			$result = $this -> comment_model -> updatePublish($Id, $Publish);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode(1);
		}
		public function updateCommentOrders() {
			$this -> load -> model('administrator/comment_model');
			$result = $this -> comment_model -> updateOrders();
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
		public function deleteComment() {
			$this -> load -> model('administrator/comment_model');
			$this -> input -> post('Id') ? $Id = $this -> input -> post('Id') : $Id = 0;
			$result = $this -> comment_model -> delete($Id);
			
			$result ? $a = '1' : $a = '0';
			echo json_encode($a);
		}
	/************* ket thuc Cac method thao tac voi COMMENT
***************************************************************************************/

        /************* Ket thuc thao tac voi SEO
***************************************************************************************/
        public function Delete_Seo_Link() {
            $this -> load -> model('administrator/seo_link_model');
            $id = $this -> input -> post('id');
            $result = $this -> seo_link_model -> seo_link_delete($id);
			
            $result ? $a = '1' : $a = '0';
            echo json_encode($a);
        }
        /************* Ket thuc thao tac voi SEO
***************************************************************************************/


	}
?>
