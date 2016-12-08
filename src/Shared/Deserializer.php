<?php
use \Phalcon\Http\Request as Request;

namespace PhashionBaker;

class RequestDeserializer{

  static function toInstance(Request $request, string $className){
    $instance = new $className();

    $properties = get_object_vars($instance);
    
    foreach($properties as $property){
      if($request->isPost() && $request->hasPost($property)){
        $instance->{$property} = $request->getPost($property);
      }elseif($request->isPut() && $request->hasPut($property)){
        $instance->{$property} = $request->getPut($property);
      }
      if($request->hasQuery($property)){
        $instance->{$property} = $request->getPut($property);
      }
    }
    return $instance;
  }
}
