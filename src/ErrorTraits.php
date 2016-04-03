<?php
namespace PhashionBaker;

trait ErrorTraits{
  public $errors = [];
  public function hasError(){
    return count($this->errors) > 0;
  }
  public function error($message){
    $this->errors[] = $message;
  }
  public function resetErrors(){
    $this->errors = [];
  }
}
