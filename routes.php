<?php

session_start();

$router = new \Bramus\Router\Router();

$router->setNamespace('\App\Controller');

$router->get('/', 'SampleController@welcome');

$router->get('/login', 'LoginController@showLogin');
$router->post('/login', 'LoginController@doLogin');

$router->get('/logout', 'LoginController@logout');

$router->get('/dashboard', 'SampleController@dashboard');

$router->get('/.*', function(){
    header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
    header("Location: " . \Config\App::$path . "/404.html");
    exit();
});

$router->run();