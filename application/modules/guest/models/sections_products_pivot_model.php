<?php
	class Sections_products_pivot_model extends Cms_Base_model {
		function __construct() {
			parent::__construct();
		}

        public function list_by_product_id($product_id)
        {
            $selectClause = "select * from sections_products_pivot where product_id = $product_id order by CreatedDate desc";
            $result = $this->db->query($selectClause);
            return $result->result_array();
        }

        public function list_by_section_id($section_id)
        {
            $selectClause = "select * from sections_products_pivot where section_id = $section_id order by CreatedDate desc";
            $result = $this->db->query($selectClause);
            return $result->result_array();
        }
	}
?>