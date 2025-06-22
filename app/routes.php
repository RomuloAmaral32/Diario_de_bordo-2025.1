<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'LandingController@index');

$router->get('postslist', 'PostsListController@index');
$router->get('viewpost', 'ViewPostController@index');
$router->get('viewpost/search','PostsListController@searchPost');



$router->get('users', 'UserAdminController@index');
$router->get('users/search', 'UserAdminController@search'); 
$router->post('users/create', 'UserAdminController@create');
$router->post('users/edit', 'UserAdminController@edit');
$router->post('users/delete', 'UserAdminController@delete');



$router->get('posts', 'PostAdminController@index');
$router->get('posts/search', 'PostAdminController@search');  
$router->post('posts/create', 'PostAdminController@create'); 
$router->post('posts/edit', 'PostAdminController@edit'); 
$router->post('posts/delete', 'PostAdminController@delete'); 


$router->get('login', 'ExibirLoginController@exibirLogin');
$router->get('dashboard', 'ExibirDashboardController@exibirDashboard');
$router->post('login', 'ExibirLoginController@efetuaLogin');
$router->post('logout', 'ExibirLoginController@efetuarLogout');





?>