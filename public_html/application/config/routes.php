<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route[LOGIN_PAGE] = 'app/login';
$route['logout'] = 'app/logout';
$route['signup'] = 'app/createaccount';
$route['reset'] = 'app/reset';


/*Admin routes
 * Routes for admin
 */
$route['admin/users/corpodetails/(:num)'] = function ($key){return 'admin/users/corpoview/'.strtolower($key);};
$route['admin/users/corpomodify/(:num)'] = function ($key){return 'admin/users/corpoedit/'.strtolower($key);};

$route['admin/financial/removecurrency'] = 'admin/financial/deletecurrency';

$route['admin/weather'] = 'admin/weather';

$route['admin/landtypes/addlandtype'] = 'admin/landtypes/addtypeland';
$route['admin/landtypes/preparation/(:num)'] = function ($key){return 'admin/landtypes/prepare/'.strtolower($key);};
$route['admin/landtypes/modify/(:num)'] = function ($key){return 'admin/landtypes/modification/'.strtolower($key);};
$route['admin/landtypes/cultivation/(:num)'] = function ($key){return 'admin/landtypes/landcrop_cultivation/'.strtolower($key);};
$route['admin/landtypes/cdetails/(:num)/(:num)'] = function ($key,$key2){return 'admin/landtypes/landcutivationdetails/'.$key.'/'.$key2;};
$route['admin/landtypes/stagedetails/(:num)/(:num)'] = function ($key1,$key2){return 'admin/landtypes/detailsstage/'.$key1.'/'.$key2;};

$route['admin/settings/profile'] = 'admin/settings';
$route['admin/settings/app'] = 'admin/settings/appu';
$route['admin/settings/addsystemsettings'] = 'admin/settings/settingadd';
$route['admin/settings/updatesettings'] = 'admin/settings/update';
$route['admin/settings/updatesystemsettings'] = 'admin/settings/updatesystem';

$route['admin/weather/removecity'] = 'admin/weather/deletecity';
$route['admin/weather/cities'] = 'admin/weather/managecities';
$route['admin/weather/modifycity/(:num)'] = function ($key){return 'admin/weather/citymodify/'.strtolower($key);};
$route['admin/weather/location/(:num)'] = function ($key){return 'admin/weather/locations/'.strtolower($key);};

$route['admin/education'] = 'admin/education';

$route['admin/education/categories'] = 'admin/education/educategories';
$route['admin/education/removecategory'] = 'admin/education/deletecategory';
$route['admin/education/modifycategory/(:num)'] = function ($key){return 'admin/education/categorymodify/'.strtolower($key);};

$route['admin/education/types'] = 'admin/education/edutypes';
$route['admin/education/removetypes'] = 'admin/education/deletetypes';
$route['admin/education/modifytypes/(:num)'] = function ($key){ return 'admin/education/typemodify/'.strtolower($key);};

$route['admin/education/videos'] = 'admin/education/eduvideos';
$route['admin/education/mvideo/(:num)'] = function ($key){ return 'admin/education/videomodify/'.strtolower($key);};
$route['admin/education/dvideo/(:num)'] = function ($key){return 'admin/education/videodetails/'.strtolower($key);};
$route['admin/education/removevideo'] = 'admin/education/deletevideo';


/*Expert routes
 * Routes for expert
 */

$route['expert/financial/removecurrency'] = 'expert/financial/deletecurrency';

$route['expert/weather'] = 'expert/weather';

$route['expert/landtypes/addlandtype'] = 'expert/landtypes/addtypeland';
$route['expert/landcrops'] = 'expert/landtypes/landcrops';
$route['expert/landtypes/preparation/(:num)'] = function ($key){return 'expert/landtypes/prepare/'.strtolower($key);};
$route['expert/landtypes/modify/(:num)'] = function ($key){return 'expert/landtypes/modification/'.strtolower($key);};
$route['expert/landtypes/cultivation/(:num)'] = function ($key){return 'expert/landtypes/landcrop_cultivation/'.strtolower($key);};
$route['expert/landtypes/cdetails/(:num)/(:num)'] = function ($key,$key2){return 'expert/landtypes/landcutivationdetails/'.$key.'/'.$key2;};
$route['expert/landtypes/stagedetails/(:num)/(:num)'] = function ($key1,$key2){return 'expert/landtypes/detailsstage/'.$key1.'/'.$key2;};

$route['expert/settings/profile'] = 'expert/settings';
$route['expert/settings/app'] = 'expert/settings/appu';
$route['expert/settings/addsystemsettings'] = 'expert/settings/settingadd';
$route['expert/settings/updatesettings'] = 'expert/settings/update';
$route['expert/settings/updatesystemsettings'] = 'expert/settings/updatesystem';

$route['expert/weather/removecity'] = 'expert/weather/deletecity';
$route['expert/weather/cities'] = 'expert/weather/managecities';
$route['expert/weather/modifycity/(:num)'] = function ($key){return 'expert/weather/citymodify/'.strtolower($key);};

$route['expert/education'] = 'expert/education';

$route['expert/education/categories'] = 'expert/education/educategories';
$route['expert/education/removecategory'] = 'expert/education/deletecategory';
$route['expert/education/modifycategory/(:num)'] = function ($key){return 'expert/education/categorymodify/'.strtolower($key);};

$route['expert/education/types'] = 'expert/education/edutypes';
$route['expert/education/removetypes'] = 'expert/education/deletetypes';
$route['expert/education/modifytypes/(:num)'] = function ($key){ return 'expert/education/typemodify/'.strtolower($key);};

$route['expert/education/videos'] = 'expert/education/eduvideos';
$route['expert/education/mvideo/(:num)'] = function ($key){ return 'expert/education/videomodify/'.strtolower($key);};
$route['expert/education/dvideo/(:num)'] = function ($key){return 'expert/education/videodetails/'.strtolower($key);};
$route['expert/education/removevideo'] = 'expert/education/deletevideo';

/*Client routes 
 * Routes for clients
 */
$route['client/overview'] = 'client/profile/overview';
$route['client/settings'] = 'client/profile/settings';

$route['client/esearch'] = 'client/education/search';

$route['client/crops/deletevariety'] = 'client/crops/deletecropvariety';
$route['client/crops/modifyvariety'] = 'client/crops/modifycropvariety';
$route['client/crops/register'] = 'client/crops/registar';
$route['client/crops/details/(:num)'] = function ($key){return 'client/crops/cropinfo/'.strtolower($key);};
$route['client/crops/varieties/(:num)'] = function ($key){return 'client/crops/cropvarieties/'.strtolower($key);};

$route['client/fields'] = 'client/agriculture/fields';
$route['client/field/register'] = 'client/agriculture/registerfield';
$route['client/field/modify/(:num)'] = function ($key){return 'client/agriculture/modifyfield/'.strtolower($key);};
$route['client/field/details/(:num)'] = function ($key){return 'client/agriculture/detailsfield/'.strtolower($key);};

$route['client/market/manage'] = 'client/market/manageshops';

$route['app/error'] = 'app/error404';

$route['client/videos'] = 'client/education/videos';
$route['client/vdetails/(:num)'] = function ($key){return 'client/education/videodetails/'.strtolower($key);};

$route['client/categoryvideos/(:num)'] = function ($key){return 'client/education/categoryvideos/'.strtolower($key);};


$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = FALSE;
