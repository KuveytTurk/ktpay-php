<?php

namespace KTPay\Models\Request;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;
use KTPay\Helpers\Converter\JsonConverter;
use KTPay\Helpers\KTPayHelper;

class GetTransactionRequest implements IJsonConvertible {

    private $language;
    private $merchantId;
    private $customerId;
    private $username;
    private $hashData;
    private $orderId;

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
     * @param $password
     */
    public function setHashData($password) {

        $hashPassword = KTPayHelper::hashPassword($password);
        $hashStr = $this->merchantId . $this->username . $hashPassword;
        $this->hashData = KTPayHelper::computeHash($hashStr, $hashPassword);
    }

    /**
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("language", $this->getLanguage())
            ->add("merchantId", $this->getMerchantId())
            ->add("customerId", $this->getCustomerId())
            ->add("username", $this->getUsername())
            ->add("hashData", $this->getHashData())
            ->add("orderId", $this->getOrderId())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}