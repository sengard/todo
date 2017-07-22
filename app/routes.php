<?php

$router->get('', 'PagesController@home');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');

$router->get('login', 'UsersController@loginShow');
$router->post('login', 'UsersController@loginPost');
$router->get('logout', 'UsersController@logout');

$router->get('tasks', 'TasksController@index');
$router->post('tasks', 'TasksController@store');