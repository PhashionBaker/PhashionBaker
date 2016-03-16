<?php
use Phalcon\Di;
use Phalcon\Di\FactoryDefault;

ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT_PATH', __DIR__ . './');
define('PHASHIONBAKER_PATH', __DIR__ . '../src');
set_include_path(
    ROOT_PATH . PATH_SEPARATOR . get_include_path()
);

$loader = new \Phalcon\Loader();

$loader->registerDirs(
    array(
        ROOT_PATH,
        'Phalcon' => ROOT_PATH.'Phalcon',
        'PhashionBaker' => PHASHIONBAKER_PATH
    )
);

$loader->register();

$di = new FactoryDefault();
Di::reset();

// Add any needed services to the DI here

Di::setDefault($di);
