<?php
include_once('PhashionBaker\Site.php');
include_once('PhashionBaker\RouteHandler.php');
include_once('PhashionBaker\Route.Interface.php');
include_once('PhashionBaker\Route.php');
include_once('Controllers\MainController.php');

try{
  $site = new PhashionBaker\Site(__DIR__ . '/config.ini');

  $mainHandler = new PhashionBaker\RouteHandler('MainController', '/main');
  $mainHandler->add( new PhashionBaker\Route(['get'], '', 'index') );
  $mainHandler->add( new PhashionBaker\Route(['get'], '/something', 'index') );
  $site->stitch($mainHandler);

  $site->dispatch();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}
