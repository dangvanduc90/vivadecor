<?php



	class Subscribe_model extends Cms_Base_model {



		function __construct() {



			parent::__construct();



		}



				// fill all categories into category view



		public function Get_All_Subscribe($limit_start=false,$limit_show=false) {



			$this -> db -> select('*, products.ProductsID, products.Title as ProductsTitle');


			if ($limit_show && $limit_start) {


				$this -> db -> limit($limit_show,$limit_start);


			}


			$this -> db -> from('subscribe');
			$this -> db -> join('products', 'subscribe.ProductsID = products.ProductsID', 'left');

			$result = $this -> db -> get();





			return $result->result_array();



		}

		

		public function delete($id = false) {



			if($id !== false) {



				$this -> db -> delete('subscribe',array('SubscribeID' => $id));







				if($this -> db -> affected_rows() > 0)



					return true;

				else

				return false;



			}else {



				show_404();



			}



		}

	}



?>