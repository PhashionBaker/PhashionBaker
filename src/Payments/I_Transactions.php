<?php
namespace PhashionBaker\Payments;

interface I_Transactions{
  public function agreement(PaymentSources $paymentSource);
  public function authenticate(PaymentProcessors $paymentProcessor);
  public function authorize(PaymentSources $paymentSource, $amount);
  public function capture(Transactions $transaction, $amount);
  public function charge(PaymentSources $paymentSource, $amount);
  public function refund(Transactions $transaction, $amount);
  public function schedule(PaymentSources $paymentSource);  
  public function store(PaymentSources $paymentSource);
}
