<?php

require '../vendor/autoload.php';

$envConfig = \KTPay\Config::getTestCredentials();

$getTransactionsRequest = new \KTPay\Models\Request\GetTransactionsRequest();
$getTransactionsRequest->setLanguage(KTPay\Models\Language::TR);
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

$service = new \KTPay\Services\KTPayService();
try {

    $response = $service->getTransactions($envConfig['serviceUrl'], $getTransactionsRequest->toJSONString());

    if($response['statusCode'] != 200){

        throw new Exception('İşleminiz gerçekleştirilemedi.', 'SaleReversalError');
    }

    print_r($response['body']);

} catch (Exception $e) {

    print_r($e);
}