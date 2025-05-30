<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('users', 'UserAdminController@index');
$router->post('users/create', 'UserAdminController@create');
$router->post('users/edit', 'UserAdminController@edit');
$router->post('users/delete', 'UserAdminController@delete'); 


$router->get('posts', 'PostAdminController@index');
$router->post('posts/create', 'PostAdminController@create'); 
$router->post('posts/edit', 'PostAdminController@edit'); 
$router->post('posts/delete', 'PostAdminController@delete'); 

$router->get('login', 'Controller@exibirLogin');
$router->get('dashboard', 'Controller@exibirDashboard');
$router->post('login', 'Controller@efetuaLogin');
$router->post('logout', 'Controller@efetuarLogout');


?>