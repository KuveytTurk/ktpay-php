<?php

namespace KTPay\Models\Request;

use KTPay\Helpers\Converter\JsonConverter;
use KTPay\Helpers\KTPayHelper;
use KTPay\Models\SaleReversalType;

class SaleReversalRequest {

    private $language;
    private $saleReversalType;
    private $merchantId;
    private $customerId;
    private $username;
    private $hashData;
    private $orderId;
    private $merchantOrderId;
    private $amount;

    /**
     * @return integer
     */
    public function getLanguage() {

        return $this->language;
    }

    /**
     * @param integer $language
     */
    public function setLanguage($language) {

        $this->language = $language;
    }

    /**
     * @return integer
     */
    public function getSaleReversalType() {

        return $this->saleReversalType;
    }

    /**
     * @param integer $saleReversalType
     */
    public function setSaleReversalType($saleReversalType) {

        $this->saleReversalType = $saleReversalType;
    }

    /**
     * @return integer
     */
    public function getMerchantId() {

        return $this->merchantId;
    }

    /**
     * @param integer $merchantId
     */
    public function setMerchantId($merchantId) {

        $this->merchantId = $merchantId;
    }

    /**
     * @return integer
     */
    public function getCustomerId() {

        return $this->customerId;
    }

    /**
     * @param integer $customerId
     */
    public function setCustomerId($customerId) {

        $this->customerId = $customerId;
    }

    /**
     * @return string
     */
    public function getUsername() {

        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username) {

        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getHashData() {

        return $this->hashData;
    }

    /**
     * @return integer
     */
    public function getOrderId() {

        return $this->orderId;
    }

    /**
     * @param integer $orderId
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
    public function getAmount() {

        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount) {

        $this->amount = $amount;
    }

    /**
     * @param $password
     */
    public function setHashData($password) {

        $hashPassword = KTPayHelper::hashPassword($password);
        $this->amount = $this->saleReversalType != SaleReversalType::PARTIAL_DRAWBACK || empty($this->amount) ? "0" : $this->amount;
        $hashStr = $this->merchantId . $this->merchantOrderId . $this->amount . $this->username . $hashPassword;
        $this->hashData = KTPayHelper::computeHash($hashStr, $hashPassword);
    }

    /**
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("language", $this->getLanguage())
            ->add("saleReversalType", $this->getSaleReversalType())
            ->add("merchantId", $this->getMerchantId())
            ->add("customerId", $this->getCustomerId())
            ->add("username", $this->getUsername())
            ->add("hashData", $this->getHashData())
            ->add("orderId", $this->getOrderId())
            ->add("merchantOrderId", $this->getMerchantOrderId())
            ->add("amount", $this->getAmount())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}