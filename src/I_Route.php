<?php
namespace PhashionBaker;
interface I_Route{
  //Returns an array of valid strings of HTTP request types
  public function types();
  //Returns the url path to match
  public function path();
  //Returns the handler method
  public function method();
}
