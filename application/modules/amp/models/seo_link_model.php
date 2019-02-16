<?php 
	class Seo_link_model extends Cms_Base_model {
		function __construct() {
			parent::__construct();
		}

		public function Get_All_SEO_Link() {
			$result = $this -> db -> get("seolink");
			$arr = $result -> result_array();
			return $arr;
		}

		private function Check_input_field() {
			$this -> input -> post('Title') ? $Title = $this -> input -> post('Title') : $Title = "";
            $this -> input -> post('Link') ? $Link = $this -> input -> post('Link') : $Link = "";
			$data = array(
					'Title' => $Title,
					'Link' => $Link
				);
			return $data;
		}

		public function Update_SEO_Link($id) {
			$receivedata = $this -> Check_input_field();
			$data = array(
				'Title' => $receivedata['Title'],
				'Link' => $receivedata['Link']
			);
			$this -> db -> update("seolink",$data,array("SeoLinkID" => $id));
			if($this -> db -> affected_rows() > 0)
				return true;
			return false;
		}

		public function insert() {
			$receivedata = $this -> Check_input_field();
			$data = array(
				'Title' => $receivedata['Title'],
				'Link' => $receivedata['Link']
			);		

			$this -> db -> insert("seolink",$data);
			if($this -> db -> affected_rows() > 0)
				return true;
			return false;
		}

		public function seo_link_delete($id) {
			$this -> db -> delete("seolink",array('SeoLinkID' => $id));
			if($this -> db -> affected_rows() > 0)
				return true;
			return false;
		}
	}
	
?>