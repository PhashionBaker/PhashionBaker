<?php
namespace PhashionBaker\Payments;

class ManualTransactions extends Transactions implements I_Transactions{
  public $hadErrors;
  public $errors;
  public $response = "SUCCESS";
  public function agreement(PaymentSources $paymentSource){ return $this; }
  public function authenticate(PaymentProcessors $paymentProcessor){ return $this; }
  public function authorize(PaymentSources $paymentSource, $amount){ return $this; }
  public function capture(Transactions $transaction, $amount){ return $this; }
  public function charge(PaymentSources $paymentSource, $amount){ return $this; }
  public function refund(Transactions $transaction, $amount){ return $this; }
  public function schedule(PaymentSources $paymentSource){ return $this; }
  public function store(PaymentSources $paymentSource){ return $this; }
}
