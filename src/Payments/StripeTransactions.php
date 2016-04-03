<?php
namespace PhashionBaker\Payments;

class StripeTransactions extends Transactions implements I_Transactions{
  public function agreement(PaymentSources $paymentSource);
  public function authenticate(PaymentProcessors $paymentProcessor);
  public function authorize(PaymentSources $paymentSource, float $amount);
  public function capture(Transactions $transaction, float $amount);
  public function charge(PaymentSources $paymentSource, float $amount);
  public function refund(Transactions $transaction, float $amount);
  public function schedule(PaymentSources $paymentSource);
  public function store(PaymentSources $paymentSource);
}
