<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Main pages
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');

// Authentication routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::attemptRegister');
$routes->get('logout', 'Auth::logout');
$routes->get('forgot-password', 'Auth::forgotPassword');
$routes->post('forgot-password', 'Auth::processForgotPassword');
$routes->get('reset-password/(:segment)', 'Auth::resetPassword/$1');
$routes->post('reset-password', 'Auth::processResetPassword');
$routes->get('admin/login', 'Auth::adminLogin');
$routes->post('admin/login', 'Auth::attemptAdminLogin');
$routes->get('admin/register', 'Auth::adminRegister');
$routes->post('admin/register', 'Auth::attemptAdminRegister');

// User profile routes
$routes->group('profile', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Profile::index');
    $routes->get('edit', 'Profile::edit');
    $routes->post('update', 'Profile::update');
    $routes->get('change-password', 'Profile::changePassword');
    $routes->post('update-password', 'Profile::updatePassword');
});

// Posts/Articles routes
$routes->get('posts', 'Posts::index');
$routes->get('posts/(:num)', 'Posts::show/$1');
$routes->group('posts', ['filter' => 'auth'], function($routes) {
    $routes->get('create', 'Posts::create');
    $routes->post('store', 'Posts::store');
    $routes->get('edit/(:num)', 'Posts::edit/$1');
    $routes->post('update/(:num)', 'Posts::update/$1');
    $routes->get('delete/(:num)', 'Posts::delete/$1');
    $routes->post('(:num)/comment', 'Comments::store/$1');
});

// Comments routes (for AJAX)
$routes->group('comments', ['filter' => 'auth'], function($routes) {
    $routes->post('(:num)/update', 'Comments::update/$1');
    $routes->post('(:num)/delete', 'Comments::delete/$1');
    $routes->post('(:num)/like', 'Comments::like/$1');
});

// Likes/reactions routes (for AJAX)
$routes->group('likes', ['filter' => 'auth'], function($routes) {
    $routes->post('post/(:num)', 'Likes::togglePostLike/$1');
    $routes->post('comment/(:num)', 'Likes::toggleCommentLike/$1');
});

// Admin routes
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('users', 'Admin::users');
    $routes->get('posts', 'Admin::posts');
    $routes->get('comments', 'Admin::comments');
    $routes->get('categories', 'Admin::categories');
    $routes->post('categories/store', 'Admin::storeCategory');
    $routes->post('categories/update/(:num)', 'Admin::updateCategory/$1');
    $routes->get('categories/delete/(:num)', 'Admin::deleteCategory/$1');
    $routes->get('dashboard', 'Admin::dashboard');
});

// Static pages
$routes->get('terms', 'Home::terms');
$routes->get('privacy', 'Home::privacy');
$routes->get('contact', 'Home::contact');
$routes->post('contact/send', 'Home::sendContact');

// API routes (if needed)
$routes->group('api', function($routes) {
    $routes->get('posts', 'Api\Posts::index');
    $routes->get('posts/(:num)', 'Api\Posts::show/$1');
    $routes->get('categories', 'Api\Categories::index');
    $routes->get('tags', 'Api\Tags::index');
});

// Fallback route
$routes->set404Override(function() {
    return view('errors/custom_404');
});
