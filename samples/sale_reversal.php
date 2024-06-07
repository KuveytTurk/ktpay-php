<?php

require '../vendor/autoload.php';

$envConfig = \KTPay\Config::getTestCredentials();

$saleReversalRequest = new \KTPay\Models\Request\SaleReversalRequest();
$saleReversalRequest->setLanguage(KTPay\Models\Language::TR);
$saleReversalRequest->setSaleReversalType(KTPay\Models\SaleReversalType::CANCEL); //SaleReversalType::DRAWBACK, SaleReversalType::PARTIAL_DRAWBACK
$saleReversalRequest->setMerchantId($envConfig['merchantId']);
$saleReversalRequest->setCustomerId($envConfig['customerId']);
$saleReversalRequest->setUsername($envConfig['username']);
$saleReversalRequest->setOrderId(203418187);
$saleReversalRequest->setMerchantOrderId('KTPay-PHP-1577368010');
$saleReversalRequest->setAmount('100');
$saleReversalRequest->setHashData($envConfig['password']);

$service = new \KTPay\Services\KTPayService();
try {

    $response = $service->saleReversal($envConfig['serviceUrl'], $saleReversalRequest->toJSONString());

    if($response['statusCode'] != 200){

        throw new Exception('İşleminiz gerçekleştirilemedi.', 'SaleReversalError');
    }

    print_r($response['body']);

} catch (Exception $e) {

    print_r($e);
}