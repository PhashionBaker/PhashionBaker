<?php
namespace Payments;

use PhashionBaker\Payments\Transactions as Transactions;
use PhashionBaker\Payments\I_Transactions as I_Transactions;

class MockTransactions extends Transactions implements I_Transactions{
  public $hadErrors;
  public $errors;
  public $response = "SUCCESS";

  public function agreement(PaymentSource $paymentSource){ return $this; }
  public function authenticate(PaymentProcessor $paymentProcessor){ return $this; }
  public function authorize(PaymentSource $paymentSource, float $amount){ return $this; }
  public function capture(Transactions $transaction, float $amount){ return $this; }
  public function charge(PaymentSource $paymentSource, float $amount){ return $this; }
  public function refund(Transaction $transaction, float $amount){ return $this; }
  public function schedule(PaymentSource $paymentSource){ return $this; }
  public function store(PaymentSource $paymentSource){ return $this; }
}

/**
 * Class UnitTest
 */
class PaymentsTest extends \UnitTestCase
{
    public function testAuthorizeReturnsTransaction()
    {
      $payment = new Phashionbaker\Payments\Payments();
      $paymentSource = new Phashionbaker\Payments\PaymentSource();
      $paymentProcessor = new Phashionbaker\PaymentsProcessor();
      $paymentProcessor->type = 'Mock';

      $tx = $payment->authorize($paymentSource, 101.99);

      $this->assertEquals($ts->response, 'SUCCESS');
      $this->assertInstanceOf($ts, new I_Transactions);
      $this->assertInstanceOf($ts, new Transactions);
    }
}
