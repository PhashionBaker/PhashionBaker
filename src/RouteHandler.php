<?php
namespace PhashionBaker;
class RouteHandler{
  private $_routes = [];
  private $_handler;
  private $_prefix;
  
  function __construct($handler, $prefix = ''){
    $this->_handler = $handler;
    $this->_prefix = $prefix;
  }
  public function prefix(){
    return $this->_prefix;
  }
  //Return string of class to handle the route logic
  public function handler(){
    return $this->_handler;
  }

  public function add($route){
    $this->_routes[] = $route;
    return $this;
  }

  public function routes(){
    return $this->_routes;
  }
}
