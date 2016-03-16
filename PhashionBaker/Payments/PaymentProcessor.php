<?php
namespace PhashionBaker\Payments;

use TransactionTypes;
/*
This model should have all information necessary to Initialize a transaction
sample usage:

$processor = PaymentProcessor::findFirst();
$transaction = processor->createTransaction();
*/
class PaymentProcessor{
  public $id;
  public $name;
  public $type;
  public $apiKey;
  public $merchantAccount;
  public $loginAccount;
  public $loginPassword;
  public $secretKey;

  public createTransaction($params = array()){
    $class = $this->type.'Transactions';
    $instance = new $class($params);
    if($instance instanceof I_Transactions){
      $instance->setPaymentProcessor($this)
        ->authenticate();
      return $instance;
    }else{
      throw new Phalcon\Exception('Your transaction must implement I_Transactions.');
    }
  }
}
