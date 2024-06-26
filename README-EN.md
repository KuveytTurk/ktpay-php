# ktpay-php 

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg?style=flat-square)](https://php.net/)
[![GitHub Release](https://img.shields.io/github/v/release/kuveytturk/ktpay-php?style=flat-square&color=ff4f00)](https://github.com/kuveytturk/ktpay-php/releases)
[![GitHub License](https://img.shields.io/github/license/kuveytturk/ktpay-php?style=flat-square)](https://github.com/kuveytturk/ktpay-php/blob/main/LICENSE)

This project contains integration infrastructure code developed for Kuveyt Turk Participation Bank Virtual POS services. The codes included in the project must be used to integrate and perform virtual POS transactions for online payment services provided by Kuveyt Turk Participation Bank. Any unauthorized use for different purposes will be detected by the bank, and punitive measures will be applied.

If you any errors, you can contact the [Kuveyt Turk Virtual POS Support](mailto:sanalposdestek@kuveytturk.com.tr) team.

[Türkçe](https://github.com/kuveytturk/ktpay-php/blob/main/README.md)

## Requirements

* **PHP >= 5.6.0**
* **Composer** (If KTPayAutoloader is used, it is not required. However, cURL and JSON extensions must be enabled in PHP extensions.)

## Installation

 ```bash
# Clone the project files to your local computer.
git clone https://github.com/kuveytturk/ktpay-php.git

# Configure your integration credentials.
nano .\src\Config.php

# Install dependencies and start up the project.
composer install
```

If Composer is not used, KTPayAutoloader must be included in the project. When calling the KTPayAutoloader class, the directory where the library is located should be indicated as a parameter.

```php
require_once '../KTPayAutoloader.php';
$base_dir = __DIR__ . '/src'; // Library directory path
$loader = new KTPayAutoloader($base_dir);
```

## Example Code

### Payment

> Request

```php
$paymentRequest = new \KTPay\Models\Request\PaymentRequest();
$paymentRequest->setPaymentType(1);
$paymentRequest->setLanguage(KTPay\Models\Language::EN);
$paymentRequest->setMerchantOrderId('KTPay-PHP-' . mt_rand());
$paymentRequest->setSuccessUrl('https://' . $_SERVER['SERVER_NAME'] . '/samples/success.php');
$paymentRequest->setFailUrl('https://' . $_SERVER['SERVER_NAME'] . '/samples/fail.php');
$paymentRequest->setMerchantId($envConfig['merchantId']);
$paymentRequest->setCustomerId($envConfig['customerId']);
$paymentRequest->setUsername($envConfig['username']);
$paymentRequest->setAmount('100');
$paymentRequest->setCurrency(KTPay\Models\Currency::TL);
$paymentRequest->setInstallmentCount(1);
    $customer = new \KTPay\Models\Customer();
    $customer->setFullName('JOHN DOE');
    $customer->setIdentityNumber('12345678901');
    $customer->setEmail('noreply@kuveytturk.com.tr');
        $phone = new \KTPay\Models\Phone();
        $phone->setCc('90');
        $phone->setSubscriber('5001112233');
    $customer->setPhoneNumber($phone);
    $customer->setIpAddress((new KTPay\Helpers\KTPayHelper)->getClientIP());
$paymentRequest->setCustomer($customer);
    $card = new \KTPay\Models\Card();
    $card->setCardHolderName($cardConfig['cardHolderName']);
    $card->setCardNumber($cardConfig['cardNumber']);
    $card->setExpireMonth($cardConfig['expireMonth']);
    $card->setExpireYear($cardConfig['expireYear']);
    $card->setSecurityCode($cardConfig['securityCode']);
$paymentRequest->setCard($card);
    $cartItem1 = new \KTPay\Models\CartItem();
    $cartItem1->setCartItemName('Product PHYSICAL');
    $cartItem1->setCartItemUrl('https://www.kuveytturk.com.tr');
    $cartItem1->setCartItemType(KTPay\Models\CartItemType::PHYSICAL);
    $cartItem1->setQuantity(1.5);
    $cartItem1->setPrice('10');
    $cartItem1->setTotalAmount('15');
    $cartItem2 = new \KTPay\Models\CartItem();
    $cartItem2->setCartItemName('Product VIRTUAL');
    $cartItem2->setCartItemUrl('https://www.kuveytturk.com.tr');
    $cartItem2->setCartItemType(KTPay\Models\CartItemType::VIRTUAL);
    $cartItem2->setQuantity(1);
    $cartItem2->setPrice('85');
    $cartItem2->setTotalAmount('85');
$paymentRequest->setCart([$cartItem1, $cartItem2]);
    $invoiceAddress = new \KTPay\Models\InvoiceAddress();
    $invoiceAddress->setCompany('XXX LTD.STI.');
    $invoiceAddress->setTaxNumber('111111111');
    $invoiceAddress->setTaxOffice('XXXXXXXXX');
    $invoiceAddress->setAddress('ADDRESS');
    $invoiceAddress->setCity('IZMIT');
    $invoiceAddress->setState(KTPay\Models\State::Kocaeli);
    $invoiceAddress->setCountry(KTPay\Models\Country::TURKIYE);
    $invoiceAddress->setZipCode('123456');
$paymentRequest->setInvoiceAddress($invoiceAddress);
    $shippingAddress = new \KTPay\Models\ShippingAddress();
    $shippingAddress->setFullName('JOHN DOE');
    $shippingAddress->setAddress('ADDRESS');
    $shippingAddress->setCity('IZMIT');
    $shippingAddress->setState(KTPay\Models\State::Kocaeli);
    $shippingAddress->setCountry(KTPay\Models\Country::TURKIYE);
    $shippingAddress->setZipCode('123456');
    $paymentRequest->setShippingAddress($shippingAddress);
$paymentRequest->setHashData($envConfig['password']);
```

> Response

```json
{
  "Result": {
    "OrderId": 203418187,
    "MerchantOrderId": "KTPay-PHP-1577368010",
    "MD": "OGoIEuSrswsJg3QnyNfpuClWcw0ji2SjbuVu+UptHnQy8wz6GERZrhtvaE6I3+F1"
  },
  "Success": true,
  "ResponseCode": "00",
  "ResponseMessage": "Kart doğrulandı.",
  "BusinessKey": 202406069999000000010245159,
  "TransactionTime": 1717685585
}
```

### Payment with Installment

> Request

```php
$paymentRequest = new \KTPay\Models\Request\PaymentRequest();
$paymentRequest->setPaymentType(1);
$paymentRequest->setLanguage(KTPay\Models\Language::EN);
$paymentRequest->setMerchantOrderId('KTPay-PHP-' . mt_rand());
$paymentRequest->setSuccessUrl('https://' . $_SERVER['SERVER_NAME'] . '/samples/success.php');
$paymentRequest->setFailUrl('https://' . $_SERVER['SERVER_NAME'] . '/samples/fail.php');
$paymentRequest->setMerchantId($envConfig['merchantId']);
$paymentRequest->setCustomerId($envConfig['customerId']);
$paymentRequest->setUsername($envConfig['username']);
$paymentRequest->setAmount('100');
$paymentRequest->setCurrency(KTPay\Models\Currency::TL);
$paymentRequest->setInstallmentCount(2);
    $customer = new \KTPay\Models\Customer();
    $customer->setFullName('JOHN DOE');
    $customer->setIdentityNumber('12345678901');
    $customer->setEmail('noreply@kuveytturk.com.tr');
        $phone = new \KTPay\Models\Phone();
        $phone->setCc('90');
        $phone->setSubscriber('5001112233');
    $customer->setPhoneNumber($phone);
    $customer->setIpAddress((new KTPay\Helpers\KTPayHelper)->getClientIP());
$paymentRequest->setCustomer($customer);
    $card = new \KTPay\Models\Card();
    $card->setCardHolderName($cardConfig['cardHolderName']);
    $card->setCardNumber($cardConfig['cardNumber']);
    $card->setExpireMonth($cardConfig['expireMonth']);
    $card->setExpireYear($cardConfig['expireYear']);
    $card->setSecurityCode($cardConfig['securityCode']);
$paymentRequest->setCard($card);
    $cartItem1 = new \KTPay\Models\CartItem();
    $cartItem1->setCartItemName('Product PHYSICAL');
    $cartItem1->setCartItemUrl('https://www.kuveytturk.com.tr');
    $cartItem1->setCartItemType(KTPay\Models\CartItemType::PHYSICAL);
    $cartItem1->setQuantity(1.5);
    $cartItem1->setPrice('10');
    $cartItem1->setTotalAmount('15');
    $cartItem2 = new \KTPay\Models\CartItem();
    $cartItem2->setCartItemName('Product VIRTUAL');
    $cartItem2->setCartItemUrl('https://www.kuveytturk.com.tr');
    $cartItem2->setCartItemType(KTPay\Models\CartItemType::VIRTUAL);
    $cartItem2->setQuantity(1);
    $cartItem2->setPrice('85');
    $cartItem2->setTotalAmount('85');
$paymentRequest->setCart([$cartItem1, $cartItem2]);
    $invoiceAddress = new \KTPay\Models\InvoiceAddress();
    $invoiceAddress->setCompany('XXX LTD.STI.');
    $invoiceAddress->setTaxNumber('111111111');
    $invoiceAddress->setTaxOffice('XXXXXXXXX');
    $invoiceAddress->setAddress('ADDRESS');
    $invoiceAddress->setCity('IZMIT');
    $invoiceAddress->setState(KTPay\Models\State::Kocaeli);
    $invoiceAddress->setCountry(KTPay\Models\Country::TURKIYE);
    $invoiceAddress->setZipCode('123456');
$paymentRequest->setInvoiceAddress($invoiceAddress);
    $shippingAddress = new \KTPay\Models\ShippingAddress();
    $shippingAddress->setFullName('JOHN DOE');
    $shippingAddress->setAddress('ADDRESS');
    $shippingAddress->setCity('IZMIT');
    $shippingAddress->setState(KTPay\Models\State::Kocaeli);
    $shippingAddress->setCountry(KTPay\Models\Country::TURKIYE);
    $shippingAddress->setZipCode('123456');
    $paymentRequest->setShippingAddress($shippingAddress);
$paymentRequest->setHashData($envConfig['password']);
```

> Response

```json
{
  "Result": {
    "OrderId": 203418187,
    "MerchantOrderId": "KTPay-PHP-1577368010",
    "MD": "OGoIEuSrswsJg3QnyNfpuClWcw0ji2SjbuVu+UptHnQy8wz6GERZrhtvaE6I3+F1"
  },
  "Success": true,
  "ResponseCode": "00",
  "ResponseMessage": "Kart doğrulandı.",
  "BusinessKey": 202406069999000000010245159,
  "TransactionTime": 1717685585
}
```

### Payment and Payment with Installment - Provision

> Request

```php
$provisionRequest = new \KTPay\Models\Request\ProvisionRequest();
$provisionRequest->setLanguage(KTPay\Models\Language::EN);
$provisionRequest->setMerchantId($envConfig['merchantId']);
$provisionRequest->setCustomerId($envConfig['customerId']);
$provisionRequest->setUsername($envConfig['username']);
$provisionRequest->setOrderId(203418187);
$provisionRequest->setMerchantOrderId('KTPay-PHP-1577368010');
$provisionRequest->setAmount('100');
$provisionRequest->setMd('OGoIEuSrswsJg3QnyNfpuClWcw0ji2SjbuVu+UptHnQy8wz6GERZrhtvaE6I3+F1');
$provisionRequest->setHashData($envConfig['password']);
```

> Response

```json
{
  "Result": {
    "OrderId": 203418187,
    "MerchantOrderId": "KTPay-PHP-1577368010"
  },
  "Success": true,
  "ResponseCode": "00",
  "ResponseMessage": "OTORİZASYON VERİLDİ",
  "BusinessKey": 202406069999000000010314698,
  "TransactionTime": 1717685609
}
```

### Cancel, Drawback and Partial Drawback

> Request

```php
$saleReversalRequest = new \KTPay\Models\Request\SaleReversalRequest();
$saleReversalRequest->setLanguage(KTPay\Models\Language::EN);
$saleReversalRequest->setSaleReversalType(KTPay\Models\SaleReversalType::CANCEL); //SaleReversalType::DRAWBACK, SaleReversalType::PARTIAL_DRAWBACK
$saleReversalRequest->setMerchantId($envConfig['merchantId']);
$saleReversalRequest->setCustomerId($envConfig['customerId']);
$saleReversalRequest->setUsername($envConfig['username']);
$saleReversalRequest->setOrderId(203418187);
$saleReversalRequest->setMerchantOrderId('KTPay-PHP-1577368010');
$saleReversalRequest->setAmount('100');
$saleReversalRequest->setHashData($envConfig['password']);
```

> Response

```json
{
  "Result": {
    "OrderId": 203418187,
    "MerchantOrderId": "KTPay-PHP-1577368010"
  },
  "Success": true,
  "ResponseCode": "00",
  "ResponseMessage": "OTORİZASYON VERİLDİ",
  "BusinessKey": 202406049999000000016077009,
  "TransactionTime": 1717685630
}
```

### Find Transaction

> Request

```php
$getTransactionRequest = new \KTPay\Models\Request\GetTransactionRequest();
$getTransactionRequest->setLanguage(KTPay\Models\Language::EN);
$getTransactionRequest->setMerchantId($envConfig['merchantId']);
$getTransactionRequest->setCustomerId($envConfig['customerId']);
$getTransactionRequest->setUsername($envConfig['username']);
$getTransactionRequest->setOrderId(203418187);
$getTransactionRequest->setHashData($envConfig['password']);
```

> Response

```json
{
  "Result": {
    "MerchantId": 496,
    "PosTerminalId": "VP008759",
    "OrderId": 203418187,
    "MerchantOrderId": "KTPay-PHP-1577368010",
    "CardHolderName": "JOHN DOE",
    "CardNumber": "51889655****0843",
    "CardType": "MasterCard",
    "TransactionTime": "2024-06-06T14:52:57.407",
    "IsCancellable": 0,
    "IsRefundable": 0,
    "IsPartialRefundable": 0,
    "OrderStatus": "Satış (1)",
    "LastOrderStatus": "İptal (6)",
    "OrderType": "Peşin (1)",
    "TransactionStatus": "Basarılı (1)",
    "FirstAmount": 1,
    "DrawbackAmount": 0,
    "CancelAmount": 1,
    "ClosedAmount": 0,
    "FEC": "TRY (0949)",
    "InstallmentCount": 0,
    "TransactionSecurity": "3d İşlem (3)",
    "ResponseCode": "00",
    "ResponseExplain": "İşlem gerçekleştirildi.",
    "BatchId": 548,
    "EndOfDayStatus": "Açık (1)",
    "EndOfDayTime": null,
    "ProvisionNumber": "136371",
    "Transactions": [
      {
        "OrderStatus": "Satış (1)",
        "TransactionTime": "2024-06-06T14:53:29.38",
        "BatchId": 548,
        "ProvisionNumber": "136371",
        "RRN": "415814236198",
        "Stan": "236198",
        "TransactionStatus": "Basarılı (1)",
        "ResponseCode": "00"
      },
      {
        "OrderStatus": "İptal (6)",
        "TransactionTime": "2024-06-06T14:53:49.9",
        "BatchId": 548,
        "ProvisionNumber": "136371",
        "RRN": "415814236199",
        "Stan": "236199",
        "TransactionStatus": "Basarılı (1)",
        "ResponseCode": "00"
      }
    ]
  },
  "Success": true,
  "ResponseCode": "Successfull",
  "ResponseMessage": "Your transaction has been completed successfully.",
  "BusinessKey": 202406069999000000010314881,
  "TransactionTime": 1717685648
}
```

### List Transactions

> Request

```php
$getTransactionsRequest = new \KTPay\Models\Request\GetTransactionsRequest();
$getTransactionsRequest->setLanguage(KTPay\Models\Language::EN);
$getTransactionsRequest->setMerchantId($envConfig['merchantId']);
$getTransactionsRequest->setCustomerId($envConfig['customerId']);
$getTransactionsRequest->setUsername($envConfig['username']);
$getTransactionsRequest->setOrderId(203418187); // Opsiyonel filtre
$getTransactionsRequest->setMerchantOrderId("KTPay-PHP-1577368010"); // Opsiyonel filtre
$getTransactionsRequest->setOrderStatus(6); // Opsiyonel filtre
$getTransactionsRequest->setBatchId(548); // Opsiyonel filtre
$getTransactionsRequest->setStartDate('2024-01-01 00:00:00'); // Opsiyonel filtre
$getTransactionsRequest->setEndDate('2024-12-31 23:59:59'); // Opsiyonel filtre
$getTransactionsRequest->setHashData($envConfig['password']);
```

> Response

```json
{
  "Result": {
    "Transactions": [
      {
        "MerchantId": 496,
        "PosTerminalId": "VP008759",
        "OrderId": 203418187,
        "MerchantOrderId": "KTPay-PHP-1577368010",
        "CardHolderName": "JOHN DOE",
        "CardNumber": "51889655****0843",
        "CardType": "MasterCard",
        "TransactionTime": "2024-06-06T14:52:57.407",
        "IsCancellable": 0,
        "IsRefundable": 0,
        "IsPartialRefundable": 0,
        "OrderStatus": "Satış (1)",
        "LastOrderStatus": "İptal (6)",
        "OrderType": "Peşin (1)",
        "TransactionStatus": "Basarılı (1)",
        "FirstAmount": 1,
        "DrawbackAmount": 0,
        "CancelAmount": 1,
        "ClosedAmount": 0,
        "FEC": "TRY (0949)",
        "InstallmentCount": 0,
        "TransactionSecurity": "3d İşlem (3)",
        "ResponseCode": "00",
        "ResponseExplain": "İşlem gerçekleştirildi.",
        "BatchId": 548,
        "EndOfDayStatus": "Açık (1)",
        "EndOfDayTime": null,
        "ProvisionNumber": "136371"
      }
    ]
  },
  "Success": true,
  "ResponseCode": "Successfull",
  "ResponseMessage": "Your transaction has been completed successfully.",
  "BusinessKey": 202406049999000000016078180,
  "TransactionTime": 1717685800
}
```

## License

This project is licensed under the MIT License. For details, please review the [LICENSE](https://github.com/kuveytturk/ktpay-php/blob/main/LICENSE) file.
