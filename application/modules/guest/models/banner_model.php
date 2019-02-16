<?php
	class Banner_model extends Cms_Base_model {
		function __construct() {
			parent::__construct();
		}

		public function Banner_get_all() {
			global $lang;
			$selectClause = " select ";
			if($lang == 'vi') {
				$selectClause .= ' Title,Body,Link, ';
			}else {
				$selectClause .= ' Title_en as Title,Body_en as Body,Link, ';
			}
			$selectClause .= " ImageURL,ImagePreset from banner where Publish = 1 order by Orders asc, CreatedDate desc";
			$result = $this -> db -> query($selectClause);
			$result = $result -> result();
			foreach ($result as $re){
				$re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
			}
			return $result;
		}
	}
?>