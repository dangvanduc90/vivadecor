<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Lang class */
require APPPATH."third_party/MX/Lang.php";

class CMS_Lang extends MX_Lang {
  private $mci_languages;
  private $mci_hide_default;
  private $mci_segment;
  private $mci_default_language;
  
  function __construct() {
    global $URI, $CFG;
    
    parent::__construct();
    
    $CFG->load('mci_languages');
    
    $this->mci_languages = $CFG->item('mci_languages');
    $this->mci_hide_default = $CFG->item('mci_hide_default');
    $this->mci_segment = $URI->segment(1, 0);
    $this->mci_default_language = array_search($CFG->item('language'), $this->mci_languages);
    
    if(array_key_exists($this->mci_segment, $this->mci_languages)) {
      $CFG->set_item('language', $this->mci_languages[$this->mci_segment]);
    }
  }
  
  // returns current language segment
  function mci_current() {    
    return ((array_key_exists($this->mci_segment, $this->mci_languages)) ? $this->mci_segment : $this->mci_default_language);
  }
  
  // returns current uri without language segment
  function mci_clean_uri() {
    $ci =& get_instance();
    
    $segments = $ci->uri->segment_array();
    
    if(empty($segments)) {
      return;
    }
    
    if(array_key_exists($segments[1], $this->mci_languages)) {
      array_shift($segments);
    }
    
    return implode('/', $segments);
  }
  
  // returns uri string with language segment
  function mci_make_uri($language_segment, $uri = FALSE) {
    $uri = ($uri === FALSE) ? $this->mci_clean_uri() : trim($uri, '/');
    
    if(!array_key_exists($language_segment, $this->mci_languages)) {
      return $uri;
    }
    
    if($language_segment == $this->mci_default_language AND $this->mci_hide_default === TRUE) {
      return $uri;
    }
    
    $uri = $language_segment.'/'.$uri;
    
    return $uri;
  }
  
  // returns html language bar
  function mci_language_bar() {
    $ci =& get_instance();
    
    $display = $ci->config->item('mci_display');
    
    $html = '';
    
    foreach($this->mci_languages as $segment => $name) {
      $uri = $this->mci_make_uri($segment);
      
      $row = ($segment != $this->mci_current()) ? anchor($uri, $display[$segment]['name'], 'title="'.$display[$segment]['title'].'"') : $display[$segment]['name'];
      
      $html .= sprintf($ci->config->item('mci_wrapper_language'), $row);
    }
    
  	return sprintf($ci->config->item('mci_wrapper_section'), $html);
  }

	// returns uri(s) for different languages, mixed
	function mci_change($language = false) {
		if($language == false) {
			unset($this->mci_languages[$this->mci_current()]);

			$uris = array();

			foreach(array_keys($this->mci_languages) as $segment) {
				$uris[] = $this->mci_make_uri($segment);
			}

			return $uris;
		}

		$segments = array_keys($this->mci_languages);

		if( ! in_array($language, $segments)) {
			return '';
		}

		return $this->mci_make_uri($language);
	}


}

/* End of file CMS_Lang.php */
/* Location: ./application/core/CMS_lang.php */