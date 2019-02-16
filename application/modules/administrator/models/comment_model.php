<?php

	class Comment_model extends Cms_Base_model {

		function __construct() {

			parent::__construct();

		}

				// fill all categories into category view

		public function Get_All_Comment($limit_start=false,$limit_show=false) {

			$this -> db -> select("comments.CommentsID, comments.ForeignID, comments.ParentID, comments.Name, comments.Message, comments.Publish, comments.CreatedDate, news.Title, news.Slug");

			$this -> db -> join("news", "comments.ForeignID = news.NewsID");
			$this -> db -> where("Type", 2);
			if ($limit_show && $limit_start) {
				$this -> db -> limit($limit_show,$limit_start);
			}

			$result = $this -> db -> get("comments");

			return $this -> ProductsCategories_recursion($result);

		}
		private function ProductsCategories_recursion($result = false) {

			if($result !== false) {

				$result = $result -> result_array();

				$temp = $result;

				$temp = $this -> Categories(0,$temp);

				return $temp;

			}

		}
		private function Categories($parentid = 0,$array = array(),$space = '|-----',$trees = array()){ 

			$temp = array();

			for ($i=0; $i < count($array); $i++) {

				if($array[$i]["ParentID"] == $parentid) $temp[] = $array[$i];

			}

			for ($i=0; $i < count($temp); $i++) { 

				$temp[$i]["Name"] = $space.$temp[$i]['Name'];

				$trees[] = $temp[$i];

				$trees = $this -> Categories($temp[$i]['CommentsID'],$array,$space.'|-----',$trees);

			}

			return $array;

		}

		public function delete($id = false) {

			if($id !== false) {

				$this -> db -> delete('comments',array('CommentsID' => $id));



				if($this -> db -> affected_rows() > 0)

					return true;
				else
				return false;

			}else {

				show_404();

			}

		}

		public function updatePublish($id = false, $Publish = false) {
			if($id !== false) {

				$data = array('Publish' => $Publish);

				$this -> db -> where('CommentsID',$id);

				$this -> db -> update('comments',$data);

				if($this -> db -> affected_rows() > 0)

					return true;

				return false;

			}else {

				show_404();

			}

		}

	}

?>