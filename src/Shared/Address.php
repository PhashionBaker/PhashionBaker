<?php
namespace PhashionBaker\Shared;

class Address extends Phalcon\Mvc\Model{
  public $id;
  public $name;
  public $company;
  public $address1;
  public $address2;
  public $address3;
  public $city;
  public $region;
  public $postal_code;
  public $country;
}
