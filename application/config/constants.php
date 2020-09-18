<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



//defining constants

define('DS', '/');
define('FOLDERNAME', ltrim(str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']), "/") );
$base  = ((!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') || (!empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off')) ? 'https' : 'http';
$base .= '://'.$_SERVER['HTTP_HOST'].DS . FOLDERNAME;
define('SITEURL',$base);

define('ALLOWED_TYPES','gif|jpg|jpeg|png');
define('IMG_DEFAULT',SITEURL.'public/uploads'.DS.'default_images'.DS.'no_image.png');
define('DEFAULT_IMAGES_FOLDER',SITEURL.'public/default_images'.DS);
define('CSS_FOLDER',SITEURL.'public'.DS.'css'.DS);
define('DEFAULT_IMAGES_PATH',SITEURL.'public'.DS.'default_images'.DS);
define('JS_FOLDER',SITEURL.'public'.DS.'js'.DS);
define('ORANGES_FOLDER','public/css/admin/css/orange/');
define('DATATABLE_JS_FOLDER',JS_FOLDER.'admin/dataTables/');
define('PUBLIC_JS',JS_FOLDER.'jquery.min.js');
define('HOME_PAGE_LIMIT_PRODUCTS',4);



define('JS_VALIDATE',JS_FOLDER.'jquery.validate.min.js');
define('JS_UI_VALIDATE',JS_FOLDER.'admin/jquery-ui.js');

define('SIDE_BAR_JS',JS_FOLDER.'admin/sidebar-menu.js');
define('ORANGE_BOOSTRAP_CSS',SITEURL.ORANGES_FOLDER.'bootstrap.css');
define('ORANGE_STYLE_CSS',SITEURL.ORANGES_FOLDER.'style.css');
define('ORANGE_FONT_CSS',SITEURL.ORANGES_FOLDER.'font-awesome.css');
define('ORANGE_CUSTOME_CSS',SITEURL.ORANGES_FOLDER.'custom.css');
define('CSS_UI_CSS',JS_FOLDER.'admin/jquery-ui.css');
define('JS_BOOSTRAP_MAX_LENGTH',JS_FOLDER.'admin/bootstrap-maxlength.min.js');

//

//datatables
define('DATATABLE_BOOSTRAP_CSS',DATATABLE_JS_FOLDER.'orange/dataTables.bootstrap.css');
define('DATATABLE_JS',DATATABLE_JS_FOLDER.'jquery.dataTables.js');
define('DATATABLE_BOOSTRAP_JS',DATATABLE_JS_FOLDER.'dataTables.bootstrap.js');
define('DATATABLE_DATATABLE_JS',JS_FOLDER.'data-table.js');


//categories
define('URL_CATEGORIES_INDEX',SITEURL.'Products'.DS.'index');
define('URL_AJAX_GET_CATEGORIES',SITEURL.'Products'.DS.'ajax_get_categories');
define('URL_EDIT_CATEGORY',SITEURL.'Products'.DS.'edit_cat');
define('URL_ADD_CATEGORY',SITEURL.'Products'.DS.'add_cat');

//Products
define('URL_PRODUCTS_INDEX',SITEURL.'Products'.DS.'products_index');
define('URL_AJAX_GET_PRODUCTS',SITEURL.'Products'.DS.'ajax_get_products');
define('URL_EDIT_PRODUCTS',SITEURL.'Products'.DS.'edit_product');
define('URL_ADD_PRODUCTS',SITEURL.'Products'.DS.'add_product');
define('PRODUCT_IMG_UPLOAD_PATH_URL','public/uploads'.DS.'products'.DS);
define('PRODUCT_IMG_PATH',SITEURL.'public/uploads'.DS.'products'.DS);

//icons
define('CLASS_VIEW_BTN', 'btn btn-info margin-right-5');
define('CLASS_EDIT_BTN', 'btn btn-primary margin-right-5');
define('CLASS_DELETE_BTN', 'btn btn-warning margin-right-5');
define('CLASS_MAKE_DEFAULT_BTN', 'btn btn-success margin-right-5');
define('CLASS_VIEW_ADD_IMAGES', 'btn btn-success margin-right-5');
define('CLASS_FAVOURITE_BTN', 'btn btn-info margin-right-5');
define('CLASS_ICON_VIEW', 'fa fa-eye');
define('CLASS_ICON_EDIT', 'fa fa-edit');
define('CLASS_ICON_DELETE', 'fa fa-trash');
define('CLASS_ICON_MAKE_DEFAULT', 'fa fa-hand-o-right');
define('CLASS_ICON_VIEW_ADD_IMAGE', 'fa fa-picture-o');
define('CLASS_ICON_STAR', 'fa fa-star-o');




///user paths
define('ADMIN_INDEX_URL', SITEURL.'Admin');
define('LOGIN', SITEURL.'login');
define('REGISTER', SITEURL.'register');
define('LOGOUT', SITEURL.'logout');
define('LOGIN_UTIL', CSS_FOLDER.'util.css');
define('LOGIN_MAIN', CSS_FOLDER.'main.css');
