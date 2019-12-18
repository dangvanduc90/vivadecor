<?php
	class Sections_model extends Cms_Base_model {
		function __construct() {
			parent::__construct();
		}

		public function get_all() {
            $this -> db -> where('Publish', 1);
            $this -> db -> order_by('Orders', 'asc');
            $this -> db -> order_by('CreatedDate', 'desc');
            $query = $this -> db -> get('sections');
            return $query;
		}

		public function get_by_id($id) {
            $this -> db -> where('id', $id);
            $this -> db -> where('Publish', 1);
            $this -> db -> order_by('Orders', 'asc');
            $this -> db -> order_by('CreatedDate', 'desc');
            $query = $this -> db -> get('sections');
            return $query;
		}
	}
?>