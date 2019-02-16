<?php 
	class Seo_default_model extends Cms_Base_model {
		function __construct() {
			parent::__construct();
		}

		public function Get_SEO_information() {
			$result = $this -> db -> get("seodefault");
			$arr = $result -> row_array();
			return $arr;
		}

		private function Check_input_field() {
			
			$this -> input -> post('seoPageTitle') ? $SEOTitle = $this -> input -> post('seoPageTitle') : $SEOTitle = "";
            $this -> input -> post('seoMetaKeywords') ? $SEOKeyword = $this -> input -> post('seoMetaKeywords') : $SEOKeyword = "";
            $this -> input -> post('seoMetaDesc') ? $SEODescription = $this -> input -> post('seoMetaDesc') : $SEODescription = "";
			$this -> input -> post('seoPageTitleSearch') ? $SEOTitleSearch = $this -> input -> post('seoPageTitleSearch') : $SEOTitleSearch = "";
            $this -> input -> post('seoMetaKeywordsSearch') ? $SEOKeywordSearch = $this -> input -> post('seoMetaKeywordsSearch') : $SEOKeywordSearch = "";
            $this -> input -> post('seoMetaDescSearch') ? $SEODescriptionSearch = $this -> input -> post('seoMetaDescSearch') : $SEODescriptionSearch = "";
            $this -> input -> post('Copyright') ? $Copyright = $this -> input -> post('Copyright') : $Copyright = "";
            $this -> input -> post('Slogan') ? $Slogan = $this -> input -> post('Slogan') : $Slogan = "";
            $this -> input -> post('CompanyName') ? $CompanyName = $this -> input -> post('CompanyName') : $CompanyName = "";
            $this -> input -> post('Facebook') ? $Facebook = $this -> input -> post('Facebook') : $Facebook = "";
            $this -> input -> post('Instagram') ? $Instagram = $this -> input -> post('Instagram') : $Instagram = "";
            $this -> input -> post('Linkedin') ? $Linkedin = $this -> input -> post('Linkedin') : $Linkedin = "";
            $this -> input -> post('Google') ? $Google = $this -> input -> post('Google') : $Google = "";

			$data = array(
					'SEOTitle' => $SEOTitle,
					'SEOKeyword' => $SEOKeyword,
					'SEODescription' => $SEODescription,
					'SEOTitleSearch' => $SEOTitleSearch,
					'SEOKeywordSearch' => $SEOKeywordSearch,
					'SEODescriptionSearch' => $SEODescriptionSearch,
					'Copyright' => $Copyright,
					'Slogan' => $Slogan,
					'CompanyName' => $CompanyName,
					'Facebook' => $Facebook,
					'Instagram' => $Instagram,
					'Linkedin' => $Linkedin,
					'Google' => $Google,
				);

			return $data;
		}

		public function Update_SEO_information() {
			$receivedata = $this -> Check_input_field();
			
			$data = array(
				'SEOTitle' => $receivedata['SEOTitle'],
				'SEOKeyword' => $receivedata['SEOKeyword'],
				'SEODescription' => $receivedata['SEODescription'],
				'SEOTitleSearch' => $receivedata['SEOTitleSearch'],
				'SEOKeywordSearch' => $receivedata['SEOKeywordSearch'],
				'SEODescriptionSearch' => $receivedata['SEODescriptionSearch'],
				'Copyright' => $receivedata['Copyright'],
				'Slogan' => $receivedata['Slogan'],
				'CompanyName' => $receivedata['CompanyName'],
				'Facebook' => $receivedata['Facebook'],
				'Instagram' => $receivedata['Instagram'],
				'Linkedin' => $receivedata['Linkedin'],
				'Google' => $receivedata['Google'],
			);
			
			$this -> db -> update("seodefault",$data,array("SeoDefaultID" => 1));

			if($this -> db -> affected_rows() > 0)
				return true;
			return false;
		}
	}
?>