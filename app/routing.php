<?php

// Home
$app->get('/', 'Controller\HelloController::indexAction')
    ->bind('home');

// Users
$app->get('/users', 'Controller\UserController::cgetAction')
    ->bind('user_list');
$app->get('/users/{id}', 'Controller\UserController::getAction')
    ->assert('id', '\d+')
    ->bind('user_get');
