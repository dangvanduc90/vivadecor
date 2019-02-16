<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class breadcrumb {

	private $breadcrumbs = array();

	private $_divider = '';

	private $_tag_open = '<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

	private $_tag_close = '</ol>';



	public function __construct($params = array()){

		if (count($params) > 0){

			$this->initialize($params);

		}

		log_message('debug', "Breadcrumb Class Initialized");

	}



	/**

	 * Initialize Preferences

	 *

	 * @access public

	 * @param array initialization parameters

	 * @return void

	 */



	private function initialize($params = array()){

		if (count($params) > 0){

			foreach ($params as $key => $val)

			{

				if (isset($this->{'_' . $key}))

				{

					$this->{'_' . $key} = $val;

				}

			}

		}

	}



	/**

	 * Append crumb to stack

	 *

	 * @access public

	 * @param string $title

	 * @param string $href

	 * @return void

	 */



	function append_crumb($title, $href){

		// no title or href provided

		if (!$title OR !$href) return;

		// add to end

		$this->breadcrumbs[] = array('title' => $title, 'href' => $href);

	}



	/**

	 * Prepend crumb to stack

	 *

	 * @access public

	 * @param string $title

	 * @param string $href

	 * @return void

	 */



	function prepend_crumb($title, $href){

		// no title or href provided

		if (!$title OR !$href) return;

		// add to start

		array_unshift($this->breadcrumbs, array('title' => $title, 'href' => $href));

	}



	/**

	 * Generate breadcrumb

	 *

	 * @access public

	 * @return string

	 */



	function output(){

		// breadcrumb found

		if ($this->breadcrumbs) {

			// set output variable

			$output = $this->_tag_open;

			// add html to output

			foreach ($this->breadcrumbs as $key => $crumb) {

				// add divider

				if ($key) $output .= $this->_divider;

				if ($key + 1 == count($this->breadcrumbs)) {

					$output .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active"><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" href="' . $crumb['href'] . '.html"><span itemprop="name">' . $crumb['title'] . '</span></a></a><meta itemprop="position" content="'.($key + 1).'" /></li>';

				}else{
					if ($key == 0) {
						//add link and divider
					$output .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" ><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" href="' . $crumb['href'] . '"><span itemprop="name">' . $crumb['title'] . '</span</a></a><meta itemprop="position" content="'.($key + 1).'" /></li>';
					}else
					//add link and divider
					$output .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" ><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" href="' . $crumb['href'] . '.html"><span itemprop="name">' . $crumb['title'] . '</span</a></a><meta itemprop="position" content="'.($key + 1).'" /></li>';
				}

			}

			// return html

			return $output . $this->_tag_close . PHP_EOL;

		}

		// return blank string

		return '';

	}

}