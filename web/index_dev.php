<?php

use Silex\Provider;

if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1')) || php_sapi_name() === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

require_once __DIR__.'/../vendor/autoload.php';


$app = new App\Application('dev');

$app['debug'] = true;

// Web profiler
$app->register(new Provider\HttpFragmentServiceProvider());
$app->register(new Provider\ServiceControllerServiceProvider());
$app->register(new Provider\TwigServiceProvider());

$app->register(new Provider\WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../app/cache/profiler',
));

$app->run();
