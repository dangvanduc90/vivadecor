<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/* admin */
$route['administrator/(:any)'] = 'administrator/$1';
$route['administrator'] = 'administrator';
$route['admin'] = 'administrator';

/*  admin login */
$route['administrator/adminlogin/(:any)'] = 'administrator/login/$1';
$route['administrator/login'] = 'administrator/adminlogin';
$route['administrator/loging'] = 'administrator/adminlogin/loging';

/*  admin logout */
$route['administrator/logout'] = 'administrator/adminlogin/logout';

/*  ajax handler*/
$route['ajaxhandle/admin_dichvu_ajaxhandler/(:any)'] = "ajaxhandle/admin_dichvu_ajaxhandler/$1";
$route['ajaxhandle/admin_menu_ajaxhandler/(:any)'] = "ajaxhandle/admin_menu_ajaxhandler/$1";
$route['ajaxhandle/admin_menu_hot_ajaxhandler/(:any)'] = "ajaxhandle/admin_menu_hot_ajaxhandler/$1";
$route['ajaxhandle/admin_news_ajaxhandler/(:any)'] = "ajaxhandle/admin_news_ajaxhandler/$1";
$route['ajaxhandle/admin_news_categories_ajaxhandler/(:any)'] = "ajaxhandle/admin_news_categories_ajaxhandler/$1";
$route['ajaxhandle/admin_news_tags_ajaxhandler/(:any)'] = "ajaxhandle/admin_news_tags_ajaxhandler/$1";
$route['ajaxhandle/admin_products_ajaxhandler/(:any)'] = "ajaxhandle/admin_products_ajaxhandler/$1";
$route['ajaxhandle/admin_products_categories_ajaxhandler/(:any)'] = "ajaxhandle/admin_products_categories_ajaxhandler/$1";
$route['ajaxhandle/admin_support_online_ajaxhandler/(:any)'] = "ajaxhandle/admin_support_online_ajaxhandler/$1";
$route['ajaxhandle/sorting_price_ajaxhandler/(:any)'] = "ajaxhandle/sorting_price_ajaxhandler/$1";
$route['ajaxhandle/sorting_brand_ajaxhandler/(:any)'] = "ajaxhandle/sorting_brand_ajaxhandler/$1";
$route['ajaxhandle/sorting_res_ajaxhandler/(:any)'] = "ajaxhandle/sorting_res_ajaxhandler/$1";
$route['ajaxhandle/sorting_channel_ajaxhandler/(:any)'] = "ajaxhandle/sorting_channel_ajaxhandler/$1";

$route['ajaxhandle/admin_ajaxhandler/(:any)'] = "ajaxhandle/admin_ajaxhandler/$1";
$route['ajaxhandle/client_ajaxhandler/(:any)'] = "ajaxhandle/client_ajaxhandler/$1";
$route['ajaxhandle/client_products_ajaxhandler/(:any)'] = "ajaxhandle/client_products_ajaxhandler/$1";

switch ($_SERVER['HTTP_HOST']) {
    case 'amp.vivadecor.com.vn':
		/*   amp */
		$route['default_controller'] = "amp/amp/trang_chu";
		$route['^(vi|en)$'] = $route['default_controller'];
		$route['404_override'] = '';

		$route['^((vi|en)/)?trang-chu'] = "amp/amp/trang_chu";
		// $route['^((vi|en)/)?tim-kiem.html'] = "amp/search";
		$route['^((vi|en)/)?tim-kiem'] = "amp/amp/search";
		$route['^((vi)/)?cam-on.html'] = "amp/amp/cam_on";
		$route['^((vi|en)/)?error-404.html'] = "amp/amp/error_404";

		// $route['^((vi|en)/)?([^/]+).html'] = "amp/products/$3";
		$route['^((vi|en)/)?(:any).html'] = "amp/amp/products/$3";
		$route['^((vi|en)/)?(:any)'] = "amp/amp/error_404_redirect";
		break;
    default:
		/*   guest */
		$route['default_controller'] = "guest/trang_chu";
		$route['^(vi|en)$'] = $route['default_controller'];
		$route['404_override'] = '';

		$route['^((vi|en)/)?trang-chu'] = "guest/trang_chu";
		// $route['^((vi|en)/)?tim-kiem.html'] = "guest/search";
		$route['^((vi|en)/)?tim-kiem'] = "guest/search";
		$route['^((vi)/)?cam-on.html'] = "guest/cam_on";
		$route['^((vi|en)/)?error-404.html'] = "guest/error_404";

		$route['seo/sitemap\.xml'] = "guest/sitemap";
		$route['sitemap-index.xml'] = "guest/sitemap_index";
		$route['sitemap-category.xml'] = "guest/sitemap_category";
		$route['sitemap-product.xml'] = "guest/sitemap_product";
		$route['sitemap-news.xml'] = "guest/sitemap_news";
		$route['sitemap-image.xml'] = "guest/sitemap_image";

		// $route['^((vi|en)/)?([^/]+).html'] = "guest/products/$3";
		$route['^((vi|en)/)?(:any).html'] = "guest/products/$3";
		$route['^((vi|en)/)?(:any)'] = "guest/error_404_redirect";
		/* End of file routes.php */
		/* Location: ./application/config/routes.php */
    break;
}
