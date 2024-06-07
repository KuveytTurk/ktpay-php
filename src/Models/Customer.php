<?php

namespace KTPay\Models;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;
use KTPay\Helpers\Converter\JsonConverter;

class Customer implements IJsonConvertible {

    private $fullName;
    private $phoneNumber;
    private $email;
    private $identityNumber; // TCKN, VATNumber
    private $ipAddress;

    /**
     * @return string
     */
    public function getFullName() {

        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName) {

        $this->fullName = $fullName;
    }

    /**
     * @return Phone
     */
    public function getPhoneNumber() {

        return $this->phoneNumber;
    }

    /**
     * @param Phone $phoneNumber
     */
    public function setPhoneNumber($phoneNumber) {

        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getEmail() {

        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email) {

        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getIdentityNumber() {

        return $this->identityNumber;
    }

    /**
     * @param string $identityNumber
     */
    public function setIdentityNumber($identityNumber) {

        $this->identityNumber = $identityNumber;
    }

    /**
     * @return string
     */
    public function getIpAddress() {

        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress) {

        $this->ipAddress = $ipAddress;
    }

    /**
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("fullName", $this->getFullName())
            ->add("phoneNumber", $this->getPhoneNumber())
            ->add("email", $this->getEmail())
            ->add("identityNumber", $this->getIdentityNumber())
            ->add("ipAddress", $this->getIpAddress())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}