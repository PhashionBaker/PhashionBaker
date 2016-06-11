<?php
namespace PhashionBaker\Payments;
/*
Usage should be like
$payment = new Payments();
$payment->authorize(PaymentSource $paymentSource, float $amount);
$payment->store()
*/
class Payments extends \Phalcon\Mvc\Model{
  protected $id;
  public $order_id;
  public $amount;

  private $processor;

  public function onConstruct($settings = []){
    if(isset($settings['processor']))
      $this->processor = $settings['processor'];
  }

  private function newTransaction(PaymentSources &$paymentSource, $params = array()){
    if($paymentSource->hasPaymentProcessor()){
      $processor = PaymentProcessors::findFirstById($paymentSource->payment_processor_id);
    }else{
      $processor = PaymentProcessors::findFirst();
    }
    if(!$processor){
      throw new \Phalcon\Exception('You do not have any payment processors.');
    }
    $transaction = $processor->createTransaction($params);
    $transaction->payment_source_id = $paymentSource->id;
    return $transaction;
  }

  public function initialize(){
    $this->hasMany('id', 'Transactions', 'payments_id');
  }

  public function setProcessor(PaymentProcessors $processor){
    $this->processor = $processor;
  }

  /**
  * Test that an authorization can be charged.
  */
  public function agreement(PaymentSources $paymentSource){
    $transaction = $this->newTransaction($paymentSource);
    return $transaction->agreement($paymentSource);
  }

  public function authorize(PaymentSources $paymentSource, $amount){
    $transaction = $this->newTransaction($paymentSource);
    return $transaction->authorize($paymentSource, $amount);
  }
  public function capture(Transactions $transaction, $amount){
    $paymentSource = PaymentSources::findFirst($transaction->payment_processor_id);
    if(!$transaction){
      throw new \Phalcon\Exception('Unable to find the original payment source.');
    }
    $transaction = $this->newTransaction($paymentSource);
    return $transaction->capture($transaction, $amount);
  }
  public function charge(PaymentSources $paymentSource, $amount){
    $transaction = $this->newTransaction($paymentSource);
    return $transaction->authorize($paymentSource, $amount);
  }
  public function refund(Transactions $transaction, $amount){
    $paymentSource = PaymentSources::findFirst($transaction->payment_processor_id);
    if(!$transaction){
      throw new \Phalcon\Exception('Unable to find the original payment source.');
    }
    $transaction = $this->newTransaction($paymentSource);
    return $transaction->refund($transaction, $amount);
  }
  public function schedule(PaymentSources $paymentSource){
    $transaction = $this->newTransaction($paymentSource);
    return $transaction->schedule($paymentSource, $amount);
  }
  public function store(PaymentSources $paymentSource){
    $transaction = $this->newTransaction($paymentSource);
    return $transaction->store($paymentSource, $amount);
  }
}
