<?php
namespace Payments;

interface I_Transactions{
  public $hadErrors;
  public $errors;
  public $response;

  public function agreement(PaymentSource $paymentSource);
  public function authenticate(PaymentProcessor $paymentProcessor);
  public function authorize(PaymentSource $paymentSource, float $amount);
  public function capture(Transactions $transaction, float $amount);
  public function charge(PaymentSource $paymentSource, float $amount);
  public function refund(Transaction $transaction, float $amount);
  public function schedule(PaymentSource $paymentSource);
  public function store(PaymentSource $paymentSource);
}
