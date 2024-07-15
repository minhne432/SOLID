Certainly! Let's implement the Single Responsibility Principle (SRP) in PHP with a more detailed example. We'll start with a class that violates SRP by having multiple responsibilities and then refactor it to adhere to SRP.

### Example Scenario

Suppose we have a class `Order` that handles order processing, payment, and order notifications. This violates SRP as it has more than one responsibility.

#### Without SRP

Here's how the class might look without following SRP:

```php
class Order {
    public function processOrder($orderDetails) {
        // Code to process the order
    }

    public function processPayment($paymentDetails) {
        // Code to process payment
    }

    public function sendOrderNotification($orderDetails) {
        // Code to send order notification
    }
}

$order = new Order();
$order->processOrder($orderDetails);
$order->processPayment($paymentDetails);
$order->sendOrderNotification($orderDetails);
```

In this example, the `Order` class has multiple responsibilities: processing orders, processing payments, and sending notifications.

### Refactoring to Follow SRP

To adhere to SRP, we'll split the responsibilities into separate classes.

#### Step 1: Create an Order Processing Class

This class will handle only the order processing logic.

```php
class OrderProcessor {
    public function processOrder($orderDetails) {
        // Code to process the order
        echo "Order processed.\n";
    }
}
```

#### Step 2: Create a Payment Processing Class

This class will handle only the payment processing logic.

```php
class PaymentProcessor {
    public function processPayment($paymentDetails) {
        // Code to process payment
        echo "Payment processed.\n";
    }
}
```

#### Step 3: Create an Order Notification Class

This class will handle only the order notification logic.

```php
class OrderNotifier {
    public function sendOrderNotification($orderDetails) {
        // Code to send order notification
        echo "Order notification sent.\n";
    }
}
```

#### Step 4: Use the Classes Together

Finally, use these classes in a coordinated way to handle the complete workflow.

```php
$orderDetails = ['order_id' => 123, 'product' => 'Laptop'];
$paymentDetails = ['amount' => 1000, 'method' => 'Credit Card'];

$orderProcessor = new OrderProcessor();
$orderProcessor->processOrder($orderDetails);

$paymentProcessor = new PaymentProcessor();
$paymentProcessor->processPayment($paymentDetails);

$orderNotifier = new OrderNotifier();
$orderNotifier->sendOrderNotification($orderDetails);
```

### Summary

By refactoring the original `Order` class into three separate classes (`OrderProcessor`, `PaymentProcessor`, and `OrderNotifier`), each class now has a single responsibility:

1. **OrderProcessor**: Handles order processing.
2. **PaymentProcessor**: Handles payment processing.
3. **OrderNotifier**: Handles order notifications.

This adheres to the Single Responsibility Principle, making the code easier to maintain, test, and extend. Each class is now focused on a single task, leading to better code organization and clarity.
