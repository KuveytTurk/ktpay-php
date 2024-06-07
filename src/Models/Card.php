<?php

namespace KTPay\Models;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;
use KTPay\Helpers\Converter\JsonConverter;

class Card implements IJsonConvertible {

    private $cardNumber;
    private $cardHolderName;
    private $expireMonth;
    private $expireYear;
    private $securityCode;

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
    public function getExpireMonth() {

        return $this->expireMonth;
    }

    /**
     * @param string $expireMonth
     */
    public function setExpireMonth($expireMonth) {

        $this->expireMonth = $expireMonth;
    }

    /**
     * @return string
     */
    public function getExpireYear() {

        return $this->expireYear;
    }

    /**
     * @param string $expireYear
     */
    public function setExpireYear($expireYear) {

        $this->expireYear = $expireYear;
    }

    /**
     * @return string
     */
    public function getSecurityCode() {

        return $this->securityCode;
    }

    /**
     * @param string $securityCode
     */
    public function setSecurityCode($securityCode) {

        $this->securityCode = $securityCode;
    }

    /**
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("cardNumber", $this->getCardNumber())
            ->add("cardHolderName", $this->getCardHolderName())
            ->add("expireMonth", $this->getExpireMonth())
            ->add("expireYear", $this->getExpireYear())
            ->add("securityCode", $this->getSecurityCode())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}