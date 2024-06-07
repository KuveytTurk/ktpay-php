<?php

namespace KTPay\Services\Interfaces;

interface IKTPayService {

    public function payment($url, $paymentRequest);
    public function provision($url, $provisionRequest);
    public function saleReversal($url, $saleReversalRequest);
    public function getTransaction($url, $getTransactionRequest);
    public function getTransactions($url, $getTransactionsRequest);
}