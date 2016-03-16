<?php
namespace PhashionBaker;
class Route implements I_Route{
  private $http = [];
  private $path = null;
  private $method = null;

  function __construct($methods, $path, $method){
    $this->http = $methods;
    $this->path = $path;
    $this->method = $method;
  }

  public function types(){
    return $this->http;
  }
  //Returns the url path to match
  public function path(){
    return $this->path;
  }
  //Returns the handler method
  public function method(){
    return $this->method;
  }
}
