<?php
namespace Payments;

use PhashionBaker\Payments\Transactions as Transactions;
use PhashionBaker\Payments\I_Transactions as I_Transactions;
use PhashionBaker\Payments\PaymentSources as PaymentSources;
use PhashionBaker\Payments\PaymentProcessors as PaymentProcessors;

class MockTransactions extends Transactions implements I_Transactions{
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

/**
 * Class UnitTest
 */
class PaymentsTest extends \UnitTestCase
{
    public function setUp(){
      parent::setUp();
      $di = \Phalcon\Di::getDefault();
      $sqlite = $di->get('db');
      $sqlite->execute('CREATE TABLE IF NOT EXISTS payment_processors (id int, type varchar(255)) ');
    }
    public function testAuthorizeReturnsTransaction()
    {
      $payment = new \PhashionBaker\Payments\Payments();
      $paymentSource = new PaymentSources();
      $paymentProcessor = new PaymentProcessors();
      $paymentProcessor->type = 'Mock';

      $tx = $payment->authorize($paymentSource, 101.99);

      $this->assertEquals($ts->response, 'SUCCESS');
      $this->assertInstanceOf($ts, new I_Transactions);
      $this->assertInstanceOf($ts, new Transactions);
    }
}
