<?php
namespace PhashionBaker\Payments;

class PaymentSourceType{
  static $Bank = 'Bank';
  static $CreditCard = 'CreditCard';
  static $Store = 'Store';
  static $DebitCard = 'DebitCard';
}
class PaymentSources extends \Phalcon\Mvc\Model{
  /*
  * A PaymentSource contains all information needed to create a payment with any PaymentProcessor
  * For example, it may be enough to setup an agreement, authorize or charge a payment method.
  */
  public $id;
  public $type;
  public $accountNumber;
  public $routingNumber;
  public $user_id;
  public $address_id;
  public $securityNumber;
  public $payment_processor_id;

  public function setId($id){
    $this->id = $id;
    return $this;
  }

  public function setPaymentProcessor($PaymentProcessor){
    $this->payment_processor_id = $PaymentProcessor->id;
    return $this;
  }

  public function setUser($User){
    $this->user_id = $User->id;
    return $this;
  }

  public function setAddress($Address){
    $this->address_id = $Address->id;
    return $this;
  }

  public function hasPaymentProcessor(){
    return is_int($this->payment_processor_id);
  }
}
