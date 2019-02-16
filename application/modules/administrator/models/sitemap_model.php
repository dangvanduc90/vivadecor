<?php
	class Sitemap_model extends Cms_Base_model {

		function __construct() {
			parent::__construct();
		}

		public function get_all_category_product() {
			$this -> db -> select("Slug");
			$this -> db -> where("Publish", 1);
			$query = $this -> db -> get("categoriesproducts");
			return $query -> result();
		}

		public function get_all_category_news() {
			$this -> db -> select("Slug");
			$this -> db -> where("Publish", 1);
			$query = $this -> db -> get("categoriesnews");
			return $query -> result();
		}

		public function get_all_product() {
			$this -> db -> select("Slug, ImageURL, ImageTitle, ImageAlt");
			$this -> db -> where("Publish", 1);
			$query = $this -> db -> get("products");
			return $query -> result();
		}

		public function get_all_news() {
			$this -> db -> select("Slug, ImageURL");
			$this -> db -> where("Publish", 1);
			$query = $this -> db -> get("news");
			return $query -> result();
		}

	}
?>