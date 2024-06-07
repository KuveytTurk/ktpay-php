<?php

namespace KTPay\Services;

use Exception;
use KTPay\Helpers\Client\KTPayClient;
use KTPay\Services\Interfaces\IKTPayService;

class KTPayService implements IKTPayService {

    private $client;

    public function __construct() {

        $this->client = KTPayClient::getInstance();
    }

    /**
     * @param $url
     * @param $paymentRequest
     * @return array
     * @throws Exception
     */
    public function payment($url, $paymentRequest) {

        $headers = [
            'Content-Type: application/json'
        ];
        return $this->client->post($url . '/KTPay/Payment', $headers, $paymentRequest);
    }

    /**
     * @param $url
     * @param $provisionRequest
     * @return array
     * @throws Exception
     */
    public function provision($url, $provisionRequest) {

        $headers = [
            'Content-Type: application/json'
        ];
        return $this->client->post($url . '/KTPay/Provision', $headers, $provisionRequest);
    }

    /**
     * @param $url
     * @param $saleReversalRequest
     * @return array
     * @throws Exception
     */
    public function saleReversal($url, $saleReversalRequest) {

        $headers = [
            'Content-Type: application/json'
        ];
        return $this->client->post($url . '/KTPay/SaleReversal', $headers, $saleReversalRequest);
    }

    /**
     * @param $url
     * @param $getTransactionRequest
     * @return array
     * @throws Exception
     */
    public function getTransaction($url, $getTransactionRequest) {

        $headers = [
            'Content-Type: application/json'
        ];
        return $this->client->post($url . '/KTPay/GetTransaction', $headers, $getTransactionRequest);
    }

    /**
     * @param $url
     * @param $getTransactionsRequest
     * @return array
     * @throws Exception
     */
    public function getTransactions($url, $getTransactionsRequest) {

        $headers = [
            'Content-Type: application/json'
        ];
        return $this->client->post($url . '/KTPay/GetTransactions', $headers, $getTransactionsRequest);
    }
}