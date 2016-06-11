<?php
namespace Payments;

use PhashionBaker\Payments\Transactions as Transactions;
use PhashionBaker\Payments\PaymentSources as PaymentSources;
use PhashionBaker\Payments\PaymentProcessors as PaymentProcessors;
use PhashionBaker\Payments\ManualTransactions as ManualTransactions;

class PaymentsTest extends \UnitTestCase
{
    public function setUp(){
      parent::setUp();

      $di = \Phalcon\Di::getDefault();
      $sqlite = $di->get('db');
      $queryDir = PHASHIONBAKER_PATH . '/Payments/queries/sqllite';
      if ($dh = opendir($queryDir)){
        while (($file = readdir($dh)) !== false){
          if(is_file($queryDir . "/" . $file)){
            $query = file_get_contents($queryDir . "/" . $file);
            $sqlite->execute($query);
          }
        }
        closedir($dh);
      }

      $this->payment = new \PhashionBaker\Payments\Payments();
      $this->paymentSource = new PaymentSources();
      $this->paymentProcessor = new PaymentProcessors();
      $this->paymentProcessor->type = 'Manual';

    }

    public function testAuthorizeReturnsTransaction()
    {
      $this->paymentProcessor->setId(12345678940)->save();
      $this->paymentSource->setPaymentProcessor($this->paymentProcessor)->save();

      $tx = $this->payment->authorize($this->paymentSource, 101.99);

      $this->assertEquals($tx->response, 'SUCCESS');
      $this->assertInstanceOf('\PhashionBaker\Payments\I_Transactions', $tx);
    }

    /**
    * Test that an authorization can be captured.
    */

    /**
    * Test that direct charges can be issued.
    */

    /**
    * Test that a payment can have a transaction refunded
    */
    
    public function tearDown(){
      unset($this->payment);
      unset($this->paymentProcessor);
      unset($this->paymentSource);
    }
}
