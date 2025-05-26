<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('users', 'UserAdminController@index');
$router->post('users/create', 'UserAdminController@create');
$router->post('users/edit', 'UserAdminController@edit');
$router->post('users/delete', 'UserAdminController@delete'); 




$router->get('posts', 'PostAdminController@index');
$router->post('post/create', 'PostAdminController@create'); 
$router->post('post/edit', 'PostAdminController@edit'); 
$router->post('post/delete', 'PostAdminController@delete'); 

