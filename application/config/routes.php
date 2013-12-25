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

$route['default_controller'] = "main_c"; // homepage
$route['404_override'] = '';
$route['error'] = "main_c/error"; // generic error

$route['sign-in'] = "user_c"; // user sign in
$route['join'] = "user_c/join"; // Form to join
$route['join-success'] = "user_c/join_success"; // confirmation of form submission 
$route['confirm/(:any)'] = "user_c/register_user/$1"; // confirm email code, send to 2nd form
$route['edit-profile'] = "user_c/edit_profile"; // edit logged in user profile
$route['sign-out'] = "user_c/sign_out"; // log out current user, redirect to HTTP referrer

$route['profile'] = "profile_c"; // user profile
$route['dashboard'] = "profile_c/dashboard" ; // logged in user dashboard for site
$route['user/(:any)'] = "profile_c/user/$1"; // show profile of user by user_id

$route['create-ad'] = "ad_c/create"; // create new ad
$route['ad/(:any)'] = "ad_c/ad/$1"; // show 1 ad

$route['ad-reply/(:any)'] = "message_c/ad_reply/$1"; // reply to ad
$route['message-sent'] = "message_c/confirm"; // confirm reply

/* End of file routes.php */
/* Location: ./application/config/routes.php */