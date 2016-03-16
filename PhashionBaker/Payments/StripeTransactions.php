<?php
namespace PhashionBaker\Payments;

class StripeTransactions extends Transactions implements I_Transactions{
  public function agreement(PaymentSource $paymentSource);
  public function authenticate(PaymentProcessor $paymentProcessor);
  public function authorize(PaymentSource $paymentSource, float $amount);
  public function capture(Transactions $transaction, float $amount);
  public function charge(PaymentSource $paymentSource, float $amount);
  public function refund(Transaction $transaction, float $amount);
  public function schedule(PaymentSource $paymentSource);
  public function store(PaymentSource $paymentSource);
}
