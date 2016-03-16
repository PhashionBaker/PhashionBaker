<?php
namespace PhashionBaker\Payments;

class PaymentSourceType{
  static $Bank = 'Bank';
  static $CreditCard = 'CreditCard';
  static $Store = 'Store';
  static $DebitCard = 'DebitCard';
}
class PaymentSource extends Phalcon\Mvc\Model{
  /*
  * A PaymentSource contains all information needed to create a payment with any PaymentProcessor
  */
  public $id;
  public $type;
  public $accountNumber;
  public $routingNumber;
  public $user_id;
  public $address_id;
  public $securityNumber;
  public $payment_processor_id;
}
