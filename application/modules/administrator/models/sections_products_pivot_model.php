<?php
	class Sections_products_pivot_model extends Cms_Base_model
	{
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

		public function delete_by_product_id($product_id)
		{
			$this->db->delete('sections_products_pivot', array('product_id' => $product_id));
		}

		public function add_by_product_id($product_id, $section_ids = [])
		{
		    if ($section_ids) {
                $data = [];
                foreach ($section_ids as $section_id) {
                    $item = [
                        'product_id' => $product_id,
                        'section_id' => $section_id,
                    ];
                    array_push($data, $item);
                }

                $this->db->insert_batch('sections_products_pivot', $data);
            }
		}
	}