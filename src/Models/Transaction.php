<?php

namespace KTPay\Models;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;
use KTPay\Helpers\Converter\JsonConverter;

class Transaction implements IJsonConvertible {

    private $orderStatus;
    private $transactionTime;
    private $batchId;
    private $provisionNumber;
    private $rrn;
    private $stan;
    private $transactionStatus;

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
     * @return string
     */
    public function getRrn() {

        return $this->rrn;
    }

    /**
     * @param string $rrn
     */
    public function setRrn($rrn) {

        $this->rrn = $rrn;
    }

    /**
     * @return string
     */
    public function getStan() {

        return $this->stan;
    }

    /**
     * @param string $stan
     */
    public function setStan($stan) {

        $this->stan = $stan;
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
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("orderStatus", $this->getOrderStatus())
            ->add("transactionTime", $this->getTransactionTime())
            ->add("batchId", $this->getBatchId())
            ->add("provisionNumber", $this->getProvisionNumber())
            ->add("rrn", $this->getRrn())
            ->add("stan", $this->getStan())
            ->add("transactionStatus", $this->getTransactionStatus())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}