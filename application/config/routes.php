<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'login';
// $route['default_controller'] = 'maintenance';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Dashboard
$route['dashboard'] = 'home';
$route['dashboard/login'] = 'login';
$route['dashboard/logout'] = 'login/logout';
$route['dashboard/home'] = 'home';
$route['dashboard/register'] = 'register';

// Loans
$route['dashboard/loans'] = 'loans';
$route['dashboard/loans/data_loans'] = 'loans/data_loans';
$route['dashboard/loans/getEquipment'] = 'loans/getEquipment';
$route['dashboard/loans/dataEquipment'] = 'loans/dataEquipment';
$route['dashboard/loans/listEquipment'] = 'loans/listEquipment';
$route['dashboard/loans/insert_loans'] = 'loans/insert_loans';
$route['dashboard/loans/detail'] = 'loans/detail';

$route['dashboard/incoming/list'] = 'incoming/list';
$route['dashboard/incoming/approve_data'] = 'incoming/approve_data';
$route['dashboard/incoming/rejected_data'] = 'incoming/rejected_data';
$route['dashboard/incoming/view'] = 'incoming/view';
$route['dashboard/incoming/cancel_data'] = 'incoming/cancel_data';

$route['dashboard/waiting/list'] = 'waiting/list';
$route['dashboard/waiting/approve_data'] = 'waiting/approve_data';
$route['dashboard/waiting/rejected_data'] = 'waiting/rejected_data';
$route['dashboard/waiting/view'] = 'waiting/view';

$route['dashboard/process/list'] = 'process/list';
$route['dashboard/process/approve_data'] = 'process/approve_data';
$route['dashboard/process/view'] = 'process/view';

$route['dashboard/complete/list'] = 'complete/list';
$route['dashboard/complete/view'] = 'complete/view';

$route['dashboard/late/list'] = 'late/list';
$route['dashboard/late/view'] = 'late/view';

$route['dashboard/reject/list'] = 'reject/list';
$route['dashboard/reject/view'] = 'reject/view';

$route['dashboard/cancel/list'] = 'cancel/list';
$route['dashboard/cancel/view'] = 'cancel/view';