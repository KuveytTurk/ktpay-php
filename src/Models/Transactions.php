<?php

namespace KTPay\Models;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;
use KTPay\Helpers\Converter\JsonConverter;

class Transactions implements IJsonConvertible {

    private $merchantId;
    private $posTerminalId;
    private $orderId;
    private $merchantOrderId;
    private $cardHolderName;
    private $cardNumber;
    private $cardType;
    private $transactionTime;
    private $isCancellable;
    private $isRefundable;
    private $isPartialRefundable;
    private $orderStatus;
    private $lastOrderStatus;
    private $orderType;
    private $transactionStatus;
    private $firstAmount;
    private $drawbackAmount;
    private $cancelAmount;
    private $closedAmount;
    private $fec;
    private $installmentCount;
    private $transactionSecurity;
    private $responseCode;
    private $responseExplain;
    private $batchId;
    private $endOfDayStatus;
    private $endOfDayTime;
    private $provisionNumber;

    /**
     * @return string
     */
    public function getMerchantId() {

        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     */
    public function setMerchantId($merchantId) {

        $this->merchantId = $merchantId;
    }

    /**
     * @return string
     */
    public function getPosTerminalId() {

        return $this->posTerminalId;
    }

    /**
     * @param string $posTerminalId
     */
    public function setPosTerminalId($posTerminalId) {

        $this->posTerminalId = $posTerminalId;
    }

    /**
     * @return string
     */
    public function getOrderId() {

        return $this->orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId($orderId) {

        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getMerchantOrderId() {

        return $this->merchantOrderId;
    }

    /**
     * @param string $merchantOrderId
     */
    public function setMerchantOrderId($merchantOrderId) {

        $this->merchantOrderId = $merchantOrderId;
    }

    /**
     * @return string
     */
    public function getCardHolderName() {

        return $this->cardHolderName;
    }

    /**
     * @param string $cardHolderName
     */
    public function setCardHolderName($cardHolderName) {

        $this->cardHolderName = $cardHolderName;
    }

    /**
     * @return string
     */
    public function getCardNumber() {

        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     */
    public function setCardNumber($cardNumber) {

        $this->cardNumber = $cardNumber;
    }

    /**
     * @return string
     */
    public function getCardType() {

        return $this->cardType;
    }

    /**
     * @param string $cardType
     */
    public function setCardType($cardType) {

        $this->cardType = $cardType;
    }

    /**
     * @return string
     */
    public function getTransactionTime() {

        return $this->transactionTime;
    }

    /**
     * @param string $transactionTime
     */
    public function setTransactionTime($transactionTime) {

        $this->transactionTime = $transactionTime;
    }

    /**
     * @return string
     */
    public function getIsCancellable() {

        return $this->isCancellable;
    }

    /**
     * @param string $isCancellable
     */
    public function setIsCancellable($isCancellable) {

        $this->isCancellable = $isCancellable;
    }

    /**
     * @return string
     */
    public function getIsRefundable() {

        return $this->isRefundable;
    }

    /**
     * @param string $isRefundable
     */
    public function setIsRefundable($isRefundable) {

        $this->isRefundable = $isRefundable;
    }

    /**
     * @return string
     */
    public function getIsPartialRefundable() {

        return $this->isPartialRefundable;
    }

    /**
     * @param string $isPartialRefundable
     */
    public function setIsPartialRefundable($isPartialRefundable) {

        $this->isPartialRefundable = $isPartialRefundable;
    }

    /**
     * @return string
     */
    public function getOrderStatus() {

        return $this->orderStatus;
    }

    /**
     * @param string $orderStatus
     */
    public function setOrderStatus($orderStatus) {

        $this->orderStatus = $orderStatus;
    }

    /**
     * @return string
     */
    public function getLastOrderStatus() {

        return $this->lastOrderStatus;
    }

    /**
     * @param string $lastOrderStatus
     */
    public function setLastOrderStatus($lastOrderStatus) {

        $this->lastOrderStatus = $lastOrderStatus;
    }

    /**
     * @return string
     */
    public function getOrderType() {

        return $this->orderType;
    }

    /**
     * @param string $orderType
     */
    public function setOrderType($orderType) {

        $this->orderType = $orderType;
    }

    /**
     * @return string
     */
    public function getTransactionStatus() {

        return $this->transactionStatus;
    }

    /**
     * @param string $transactionStatus
     */
    public function setTransactionStatus($transactionStatus) {

        $this->transactionStatus = $transactionStatus;
    }

    /**
     * @return string
     */
    public function getFirstAmount() {

        return $this->firstAmount;
    }

    /**
     * @param string $firstAmount
     */
    public function setFirstAmount($firstAmount) {

        $this->firstAmount = $firstAmount;
    }

    /**
     * @return string
     */
    public function getDrawbackAmount() {

        return $this->drawbackAmount;
    }

    /**
     * @param string $drawbackAmount
     */
    public function setDrawbackAmount($drawbackAmount) {

        $this->drawbackAmount = $drawbackAmount;
    }

    /**
     * @return string
     */
    public function getCancelAmount() {

        return $this->cancelAmount;
    }

    /**
     * @param string $cancelAmount
     */
    public function setCancelAmount($cancelAmount) {

        $this->cancelAmount = $cancelAmount;
    }

    /**
     * @return string
     */
    public function getClosedAmount() {

        return $this->closedAmount;
    }

    /**
     * @param string $closedAmount
     */
    public function setClosedAmount($closedAmount) {

        $this->closedAmount = $closedAmount;
    }

    /**
     * @return string
     */
    public function getFec() {

        return $this->fec;
    }

    /**
     * @param string $fec
     */
    public function setFec($fec) {

        $this->fec = $fec;
    }

    /**
     * @return string
     */
    public function getInstallmentCount() {

        return $this->installmentCount;
    }

    /**
     * @param string $installmentCount
     */
    public function setInstallmentCount($installmentCount) {

        $this->installmentCount = $installmentCount;
    }

    /**
     * @return string
     */
    public function getTransactionSecurity() {

        return $this->transactionSecurity;
    }

    /**
     * @param string $transactionSecurity
     */
    public function setTransactionSecurity($transactionSecurity) {

        $this->transactionSecurity = $transactionSecurity;
    }

    /**
     * @return string
     */
    public function getResponseCode() {

        return $this->responseCode;
    }

    /**
     * @param string $responseCode
     */
    public function setResponseCode($responseCode) {

        $this->responseCode = $responseCode;
    }

    /**
     * @return string
     */
    public function getResponseExplain() {

        return $this->responseExplain;
    }

    /**
     * @param string $responseExplain
     */
    public function setResponseExplain($responseExplain) {

        $this->responseExplain = $responseExplain;
    }

    /**
     * @return string
     */
    public function getBatchId() {

        return $this->batchId;
    }

    /**
     * @param string $batchId
     */
    public function setBatchId($batchId) {

        $this->batchId = $batchId;
    }

    /**
     * @return string
     */
    public function getEndOfDayStatus() {

        return $this->endOfDayStatus;
    }

    /**
     * @param string $endOfDayStatus
     */
    public function setEndOfDayStatus($endOfDayStatus) {

        $this->endOfDayStatus = $endOfDayStatus;
    }

    /**
     * @return string
     */
    public function getEndOfDayTime() {

        return $this->endOfDayTime;
    }

    /**
     * @param string $endOfDayTime
     */
    public function setEndOfDayTime($endOfDayTime) {

        $this->endOfDayTime = $endOfDayTime;
    }

    /**
     * @return string
     */
    public function getProvisionNumber() {

        return $this->provisionNumber;
    }

    /**
     * @param string $provisionNumber
     */
    public function setProvisionNumber($provisionNumber) {

        $this->provisionNumber = $provisionNumber;
    }

    /**
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("merchantId", $this->getMerchantId())
            ->add("posTerminalId", $this->getPosTerminalId())
            ->add("orderId", $this->getOrderId())
            ->add("merchantOrderId", $this->getMerchantOrderId())
            ->add("cardHolderName", $this->getCardHolderName())
            ->add("cardNumber", $this->getCardNumber())
            ->add("cardType", $this->getCardType())
            ->add("transactionTime", $this->getTransactionTime())
            ->add("isCancellable", $this->getIsCancellable())
            ->add("isRefundable", $this->getIsRefundable())
            ->add("isPartialRefundable", $this->getIsPartialRefundable())
            ->add("orderStatus", $this->getOrderStatus())
            ->add("lastOrderStatus", $this->getLastOrderStatus())
            ->add("orderType", $this->getOrderType())
            ->add("transactionStatus", $this->getTransactionStatus())
            ->add("firstAmount", $this->getFirstAmount())
            ->add("drawbackAmount", $this->getDrawbackAmount())
            ->add("cancelAmount", $this->getCancelAmount())
            ->add("closedAmount", $this->getClosedAmount())
            ->add("fec", $this->getFec())
            ->add("installmentCount", $this->getInstallmentCount())
            ->add("transactionSecurity", $this->getTransactionSecurity())
            ->add("responseCode", $this->getResponseCode())
            ->add("responseExplain", $this->getResponseExplain())
            ->add("batchId", $this->getBatchId())
            ->add("endOfDayStatus", $this->getEndOfDayStatus())
            ->add("endOfDayTime", $this->getEndOfDayTime())
            ->add("provisionNumber", $this->getProvisionNumber())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}