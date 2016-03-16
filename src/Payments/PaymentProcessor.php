<?php
namespace Payments
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

  public createTransaction(){
    $class = $this->type.'Transactions';
    $instance = new $class();
    $instance->setPaymentProcessor($this)
      ->authenticate();
    return $instance;
  }
}
