<?php

require '../vendor/autoload.php';

$envConfig = \KTPay\Config::getTestCredentials();

$provisionRequest = new \KTPay\Models\Request\ProvisionRequest();
$provisionRequest->setLanguage(KTPay\Models\Language::TR);
$provisionRequest->setMerchantId($envConfig['merchantId']);
$provisionRequest->setCustomerId($envConfig['customerId']);
$provisionRequest->setUsername($envConfig['username']);
$provisionRequest->setOrderId(203418187);
$provisionRequest->setMerchantOrderId('KTPay-PHP-1577368010');
$provisionRequest->setAmount('100');
$provisionRequest->setMd('OGoIEuSrswsJg3QnyNfpuClWcw0ji2SjbuVu+UptHnQy8wz6GERZrhtvaE6I3+F1');
$provisionRequest->setHashData($envConfig['password']);

$service = new \KTPay\Services\KTPayService();
try {

    $response = $service->provision($envConfig['serviceUrl'], $provisionRequest->toJSONString());

    if($response['statusCode'] != 200){

        throw new Exception('İşleminiz gerçekleştirilemedi.', 'ProvisionError');
    }

    print_r($response['body']);

} catch (Exception $e) {

    print_r($e);
}