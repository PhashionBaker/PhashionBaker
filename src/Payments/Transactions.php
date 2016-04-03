<?php
namespace PhashionBaker\Payments;

use TransactionTypes;

class Transactions extends \Phalcon\Mvc\Model{
  use \PhashionBaker\ErrorTraits;

  public $amount;
  public $currency;
  public $payment_source_id;
  public $remoteId;
  public $referenceString;
  public $payment_processor_id;

  static $defaults = [
    'amount'=>0,
    'currency'=>'USD',
    'payment_source_id'=> null,
    'remoteId'=>'',
    'referenceString'=>'',
    'transactionType'=>TransactionTypes::DirectCharge
  ];

  public function onConstruct(array $params){
    $this->build($params);
    $this->belongsTo('payment_processor_id', 'PaymentProcessor', 'id');
  }

  static function setup(array $params){
    parent::setup($params);
    $settings = array_merge(Transactions::defaults, $params);
    foreach(array_keys(Transactions::defaults) as $propertyName){
      $this->{$propertyName} = $settings[$propertyName];
    }
    return $this;
  }

  public function setPaymentProcessor(PaymentProcessors &$processor){
    $this->payment_processor_id = $processor->id;
    return $this;
  }
}
