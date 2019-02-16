<?php
	class Favicon_model extends Cms_Base_model {
		function __construct() {
			parent::__construct();
		}

		public function Favicon_get() {
			$selectClause = " select IconURL, IconPreset from favicons where IsMain = 1 
								order by CreatedDate desc,ModifiedDate desc limit 1 ";
			$result = $this -> db -> query($selectClause);
			if($result !== false) {
				$result = $result -> row_array();
				$result['IconURL'] = $result['IconPreset'] . $result['IconURL'];
				return $result;
			}
			return false;
		}
	}
?>