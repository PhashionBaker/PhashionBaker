<?php
namespace PhashionBaker\Payments;

class TransactionTypes{
  const DirectCharge = 'DIRECT CHARGE';
  const Authorization = 'AUTHORIZATION';
  const Capture = 'CAPTURE';
  const Refund = 'REFUND';
  const CashPayment = 'CASH PAYMENT';
}
