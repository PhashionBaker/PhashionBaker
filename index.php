<?php
include_once('src\Site.php');
include_once('src\RouteHandler.php');
include_once('src\Route.php');
include_once('sample\MainController.php');

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
