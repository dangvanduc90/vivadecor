<?php
	class Footer_model extends Cms_Base_model {
		function __construct() {
			parent::__construct();
		}

		public function Footer_get_all() {
			global $lang;
			$selectClause = " select ";
			if($lang == 'vi') {
				$selectClause .= ' Title,Body, ';
			}else {
				$selectClause .= ' Title_en as Title,Body_en as Body, ';
			}
			$selectClause .= " ImageURL, ImagePreset from footer where Publish = 1 order by Orders asc";
			$result = $this -> db -> query($selectClause);
			$result = $result -> result_array();
			foreach ($result as $re){
				$re['ImageURL'] = $re['ImagePreset'] . $re['ImageURL'];
			}
			return $result;
		}
	}
?>