<?php

require '../vendor/autoload.php';

$envConfig = \KTPay\Config::getTestCredentials();

$getTransactionRequest = new \KTPay\Models\Request\GetTransactionRequest();
$getTransactionRequest->setLanguage(KTPay\Models\Language::TR);
$getTransactionRequest->setMerchantId($envConfig['merchantId']);
$getTransactionRequest->setCustomerId($envConfig['customerId']);
$getTransactionRequest->setUsername($envConfig['username']);
$getTransactionRequest->setOrderId(203418187);
$getTransactionRequest->setHashData($envConfig['password']);

$service = new \KTPay\Services\KTPayService();
try {

    $response = $service->getTransaction($envConfig['serviceUrl'], $getTransactionRequest->toJSONString());

    if($response['statusCode'] != 200){

        throw new Exception('İşleminiz gerçekleştirilemedi.', 'SaleReversalError');
    }

    print_r($response['body']);

} catch (Exception $e) {

    print_r($e);
}