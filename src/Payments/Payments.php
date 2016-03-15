<?php
namespace Payments;
/*
Usage should be like
$payment = new Payments();
$payment->authorize(PaymentSource $paymentSource, float $amount);
$payment->store()
*/
class Payments extends Phalcon/Mvc/Model{
  public $id;
  public $order_id;
  public $amount;

  private $processor;

  public function onConstruct($settings = []){
    if(isset($settings['processor']))
      $this->processor = $settings['processor'];
  }

  private function newTransaction(PaymentSource &$paymentSource){
    if($paymentSource->hasPayment
    Processor){
      $processor = PaymentProcessor::findFirstById($paymentSource->payment_processor_id);
    }else{
      $processor = PaymentProcessor::findFirst();
    }
    return $processor->createTransaction();
  }

  public function initialize(){
    $this->hasMany('id', 'Transactions', 'payments_id');
  }

  public function setProcessor(PaymentProcessor $processor){
    $this->processor = $processor;
  }

  /* Methods That do the lifting */
  public function agreement(PaymentSource $paymentSource){
    $transaction = $this->newTransaction($paymentSource);
    return $transaction->agreement($paymentSource);
  }

  public function authorize(PaymentSource $paymentSource, float $amount){
    $transaction = $this->newTransaction($paymentSource);
    return $transaction->authorize($paymentSource, $amount);
  }
  public function capture(Transactions $transaction, float $amount);
  public function charge(PaymentSource $paymentSource, float $amount);
  public function refund(Transaction $transaction, float $amount);
  public function schedule(PaymentSource $paymentSource);
  public function store(PaymentSource $paymentSource);
}
