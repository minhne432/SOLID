<?php


class OrderProcessor
{
  public function processOrder($orderDetails)
  {
    echo "-----Order processed----- \n";
    echo "Details:\n";
    echo "orderId: {$orderDetails['oder_id']}\n";
    echo "product: {$orderDetails['product']}\n";
    echo "------------------------- \n";
  }
}

class PaymentProcessor
{
  public function processPayment($paymentDetails)
  {
    echo "----Payment processed----\n";
    echo "Details:\n";
    echo "amount: {$paymentDetails['amount']}\n";
    echo "method: {$paymentDetails['method']}\n";
    echo "------------------------- \n";
  }
}

class OrderNotifier
{
  public function sendOrderNotification($orderDetails)
  {
    echo "Order notification sent. \n";
    echo "Product: {$orderDetails['product']}\n";
  }
}


$orderDtails = [
  'oder_id' => 123,
  'product' => 'Laptop',
];

$paymentDatails = [
  'amount' => 1000,
  'method' => 'Credit Card',
];

$orderProcessor = new OrderProcessor();
$orderProcessor->processOrder($orderDtails);

$paymentProcessor = new PaymentProcessor();
$paymentProcessor->processPayment($paymentDatails);

$orderNotifier = new OrderNotifier();
$orderNotifier->sendOrderNotification($orderDtails);
