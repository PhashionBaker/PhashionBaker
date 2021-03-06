<?php
namespace PhashionBaker\Payments;

use TransactionTypes;
/*
This model should have all information necessary to Initialize a transaction
sample usage:

$processor = PaymentProcessor::findFirst();
$transaction = processor->createTransaction();
*/
class PaymentProcessors extends \Phalcon\Mvc\Model{
  public $id;
  public $name;
  public $type;
  public $apiKey;
  public $merchantAccount;
  public $loginAccount;
  public $loginPassword;
  public $secretKey;

  public function setId($id){
    $this->id = $id;
    return $this;
  }

  public function createTransaction($params = array()){
    $di = \Phalcon\DI\FactoryDefault::getDefault();

    $class = $this->type.'Transactions';
    if(substr($class, 0, 1) !== '/'){
      $class = '\\PhashionBaker\\Payments\\' . $class;
    }
    $instance = new $class($params);

    if($instance instanceof I_Transactions){
      $instance->authenticate($this);
      return $instance;
    }else{
      throw new Phalcon\Exception('Your transaction must implement I_Transactions.');
    }
  }
}
