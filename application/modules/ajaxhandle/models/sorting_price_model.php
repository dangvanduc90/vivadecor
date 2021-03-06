<?php 

	class Sorting_price_model extends Cms_Base_model {

		function __construct() {

			parent::__construct();

		}



		public function Ajax_Update_Publish() {

			$id = $this -> input -> post('id');

			$this -> input -> post('Publish') ? $Publish = 1 : $Publish = 0;

			if($id !== false) {

				$data = array('Publish' => (int)$Publish,

								'ModifiedBy' => $this -> session -> userdata('userid'),

								'ModifiedDate' => date('Y-m-d H:i:s', time())

							);



				$this -> db -> update('sortingprice',$data,array('SortingPriceID' => $id));



				if($this -> db -> affected_rows() > 0)

					return true;

				return false;

			}



			return false;

		}



		function Ajax_Update_Orders() {
			$id = $this -> input -> post("id");
			$this -> input -> post("orders") ? ( is_numeric($this -> input -> post("orders")) ? $orders = $this -> input -> post("orders") : $orders = 999) : $orders = 999;
			if($id && $orders) {
				$data = array(
						'Orders' => $orders,
						'ModifiedBy' => $this -> session -> userdata('userid'),
						'ModifiedDate' => date('Y-m-d H:i:s', time())
					);
				$this -> db -> update('sortingprice',$data,array('SortingPriceID' => $id));

				if($this -> db -> affected_rows() > 0)
					return true;
			}
			return false;
		}

		public function Ajax_Update_Price() {

			$id = $this -> input -> post("id");

			$this -> input -> post("pricefrom") ? ( is_numeric($this -> input -> post("pricefrom")) ? $pricefrom = $this -> input -> post("pricefrom") : $pricefrom = 0) : $pricefrom = 0;

			$this -> input -> post("priceto") ? ( is_numeric($this -> input -> post("priceto")) ? $priceto = $this -> input -> post("priceto") : $priceto = 0) : $priceto = 0;

			if($id !== false && $pricefrom !== false) {

				$data = array(

						'Title' => 'Từ ' . number_format($pricefrom,0,',','.') . ' đến ' . number_format($priceto,0,',','.'),

						'PriceFrom' => $pricefrom,

						'PriceTo' => $priceto,

						'ModifiedBy' => $this -> session -> userdata('userid'),

						'ModifiedDate' => date('Y-m-d H:i:s', time())

					);

				$this -> db -> update('sortingprice',$data,array('SortingPriceID' => $id));



				if($this -> db -> affected_rows() > 0)

					return true;

			}

			return false;

		}

		

		public function Ajax_Check_Title() {

			$title = $this -> input -> post('title');

				

			$this -> db -> select('SortingPriceID');

			$this -> db -> from('sortingprice');

			$this -> db -> where('Title', $title);

			$query3 = $this -> db -> get();

			if ($query3 -> num_rows() > 0) {

				return true;

			} else {

				return false;

			}

		}

		public function Ajax_Check_Title_Except() {

			$title = $this -> input -> post('title');

			$id = $this -> input -> post('id');

			

			$this -> db -> select('SortingPriceID');

			$this -> db -> from('sortingprice');

			$this -> db -> where_not_in('SortingPriceID', $id);

			$this -> db -> where('Title', $title);

			$query3 = $this -> db -> get();

			if ($query3 -> num_rows() > 0) {

				return true;

			} else {

				return false;

			}

		}
		
	}

?>