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
// Default Controller
$route['default_controller'] = 'welcome';

// 404 Error Override
$route['404_override'] = '';

// Automatically translate URI dashes to underscores in controller/method names
$route['translate_uri_dashes'] = FALSE;


// ==========================
// Registration Routes
// ==========================

// API route for registration (POST)
$route['api/register']['post'] = 'api/RegisterController/index';

// Web route for registration form
$route['register'] = 'auth/register';


// ==========================
// Login Routes
// ==========================

// API route for login (POST)
$route['api/login']['post'] = 'api/RegisterController/login';

// Web route for login form
$route['login'] = 'auth/login';


// ==========================
// Dashboard Routes
// ==========================

// User dashboard homepage
$route['dashboard'] = 'dashboard/index';

// User logout
$route['logout'] = 'dashboard/logout';

// Set session via controller
$route['set-session'] = 'SessionController/set_session';


// ==========================
// Blog API Routes
// ==========================

// API to create a blog post
$route['api/blog/create'] = 'api/BlogApi/create';

// API to fetch blog posts
$route['blogapi/get_posts'] = 'BlogApi/get_posts';

// API to edit a blog post
$route['api/BlogApi/edit_blog'] = 'api/BlogApi/edit_blog';

// API to delete a blog post
$route['api/BlogApi/delete_blog'] = 'api/BlogApi/delete_blog';


// ==========================
// Blog Dashboard Routes
// ==========================

// Route to create a blog post via dashboard
$route['dashboard/create_blog'] = 'dashboard/create_blog';

// Route to view user's own blog posts
$route['dashboard/your_blogs'] = 'dashboard/your_blogs';

// Route to view blog statistics
$route['dashboard/statistics'] = 'dashboard/statistics';

// Route to view all blogs
$route['dashboard/all_blogs'] = 'dashboard/all_blogs';

// Route to edit a blog post (accepts numeric blog ID)
$route['dashboard/update_blog/(:num)'] = 'dashboard/edit_blog/$1';


// ==========================
// Admin Routes
// ==========================

// Admin dashboard homepage

$route['admin/dashboard'] = 'AdminDashboard/index';


$route['admin/users'] = 'AdminDashboard/users';

$route['users'] = 'UserController/index';          // List users
$route['users/create'] = 'UserController/create';  // Show create form
$route['users/store'] = 'UserController/store';    // Handle create form submission
$route['users/edit/(:num)'] = 'UserController/edit/$1';   // Show edit form for user with id
$route['users/update/(:num)'] = 'UserController/update/$1'; // Handle update form submission
$route['users/delete/(:num)'] = 'UserController/delete/$1'; // Delete user with id

// $route['posts'] = 'AdminDashboard/posts';
$route['posts'] = 'admin/AdminDashboard/posts';
$route['admin/edit_post/(:num)'] = 'admin/AdminDashboard/edit_post/$1';
$route['admin/delete_post/(:num)'] = 'admin/AdminDashboard/delete_post/$1';
