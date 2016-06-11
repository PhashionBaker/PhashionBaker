<?php
namespace PhashionBaker;

use Phalcon\DI\FactoryDefault as DI,
	Phalcon\Mvc\Micro as Micro,
	Phalcon\Mvc\Micro\Collection as MicroCollection,
	Phalcon\Config\Adapter\Ini as IniConfig,
	Phalcon\Loader as Loader;

class Site{
  private $app = null;
  private $loader = null;
  private $di = null;
  function __construct( $configFilename ){
    //Setup Loader
    $this->loader = new Loader();
    $this->loader->registerNamespaces([
    	   "PhashionBaker"=>""]);
    //Create a DI
    $this->di = new DI();
    //Load Config
  	$config = new IniConfig($configFilename);
  	if(!defined('APP')){define('APP',__DIR__.'\\');}
  	if(!defined('DS')){define('DS','\\');}

  	//Set the database service
  	$this->di->set('config', function() use ($config){
  		return $config;
  	} );
  	//Start App
  	$this->app = new Micro($this->di);
  }
  public function stitch($routeHandler){
    $collection = new MicroCollection();
  	$collection->setHandler( $routeHandler->handler(), true );
  	$collection->setPrefix( $routeHandler->prefix() );
    foreach($routeHandler->routes() as $route){
      $httpMethods = $route->types();
      foreach ($httpMethods as $method) {
        $collection->{strtolower($method)}( $route->path(), $route->method() );
      }
    }
  	$this->app->mount($collection);
  }

  public function dispatch(){
    $app = $this->app;

    $app->notFound(function () use ($app) {
        $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    });

    $app->before(function() use ($app){

    });

    $app->after(function() use ($app) {
      $app->response->setHeader('Access-Control-Allow-Methods','GET, PUT, POST, DELETE, OPTIONS');
      $app->response->setHeader('Access-Control-Max-Age','1000');
      $app->response->setHeader('Access-Control-Allow-Headers','Content-Type, Authorization, X-Requested-With');
      $app->response->setHeader('Content-Type','application/json');
      $app->response->sendHeaders();
      echo json_encode($app->getReturnedValue());
    });

    $app->error(
        function ($exception) {
          echo json_encode([
              'status' => 'Error',
              'errors' => [$exception->getMessage()]
            ]);
          $app->response->setStatusCode(500, "Internal Server Error");
        }
    );
    //define the routes here
    $this->app->handle();

  }

}
