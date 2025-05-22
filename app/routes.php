<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('users', 'UserAdminController@index');
$router->post('users/create', 'UserAdminController@create');

$router->post('users/edit', 'UserAdminController@edit'); 