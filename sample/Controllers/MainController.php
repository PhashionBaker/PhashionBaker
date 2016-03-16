<?php
use Phalcon\Mvc\Controller;
class MainController extends Controller{
  public function index(){
    return ['some'=>'array'];
  }
}
