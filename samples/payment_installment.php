<?php

require '../vendor/autoload.php';

$envConfig = \KTPay\Config::getTestCredentials();
$cardConfig = \KTPay\Config::getInstallmentTestCard();

$paymentRequest = new \KTPay\Models\Request\PaymentRequest();
$paymentRequest->setPaymentType(1);
$paymentRequest->setLanguage(KTPay\Models\Language::TR);
$paymentRequest->setMerchantOrderId('KTPay-PHP-' . mt_rand());
$paymentRequest->setSuccessUrl(str_replace('payment_installment.php', 'success.php', \KTPay\Helpers\KTPayHelper::getURL()));
$paymentRequest->setFailUrl(str_replace('payment_installment.php', 'fail.php', \KTPay\Helpers\KTPayHelper::getURL()));
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

$service = new \KTPay\Services\KTPayService();
try {

    $response = $service->payment($envConfig['serviceUrl'], $paymentRequest->toJSONString());

    if ($response['statusCode'] != 200) {

        throw new Exception('İşleminiz gerçekleştirilemedi.', 'PaymentError');
    }

    echo $response['body'];

} catch (Exception $e) {

    print_r($e);
}