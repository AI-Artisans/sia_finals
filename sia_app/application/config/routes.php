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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'UserController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// API routes
$route['api/register']['post'] = 'Api/register';
$route['api/login']['post'] = 'Api/login';
$route['api/users']['get'] = 'api/users';
$route['api/users/(:num)']['get'] = 'api/user/$1';
$route['api/users']['post'] = 'api/create_user';
$route['api/users/(:num)']['put'] = 'api/update_user/$1';
$route['api/users/(:num)']['delete'] = 'api/delete_user/$1';

// Web routes
$route['register'] = 'UserController/register';
$route['login'] = 'UserController/login';
$route['dashboard'] = 'UserController/dashboard';
$route['api/create-blog-post']['post'] = 'Api/create_blog_post';
$route['blog/view/(:num)'] = 'UserController/view_blog/$1';
$route['blog/edit/(:num)'] = 'UserController/edit_blog/$1'; // Route for edit blog page
$route['api/add-comment']['post'] = 'Api/add_comment';
// Web route for viewing all user's posts
$route['posts'] = 'UserController/posts';

// API routes for post management
//$route['api/delete-post/(:num)']['delete'] = 'Api/delete_post/$1';
$route['api/update-post']['post'] = 'Api/update_post'; // New route for updating posts
//$route['api/delete-post'] = 'blog/delete_post';
$route['api/delete-post/(:num)']['delete'] = 'Api/delete_post/$1';

// Add this line for POST method (since your frontend uses POST):
$route['api/delete-post'] = 'Api/delete_post_post';
