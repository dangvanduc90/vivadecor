<?php
	class Ads_model extends Cms_Base_model {
		function __construct() {
			parent::__construct();
		}

		public function Ads_get_for_show($AdsGroupsID) {
			$this -> db -> select('Title,ImageURL,ImagePreset,Height,Width,Link');
            $this -> db -> from('ads');
            $this -> db -> where('AdsGroupsID', $AdsGroupsID);
            $this -> db -> where('Publish', 1);
            $this -> db -> order_by('Orders', 'asc');
            $this -> db -> order_by('CreatedDate', 'desc');
            $query = $this -> db -> get();
            $result =  $query -> result();
            foreach ($result as $re){
            	$re -> ImageURL = $re -> ImagePreset . $re -> ImageURL;
            }
            return $result;
		}
	}
?>