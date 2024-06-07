<?php

namespace KTPay\Models;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;
use KTPay\Helpers\Converter\JsonConverter;

class InvoiceAddress implements IJsonConvertible {

    private $fullName;
    private $company;
    private $identityNumber;
    private $taxNumber;
    private $taxOffice;
    private $address;
    private $zipCode;
    private $city;
    private $state;
    private $country;

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
     * @return string
     */
    public function getCompany() {

        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company) {

        $this->company = $company;
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
    public function getTaxNumber() {

        return $this->taxNumber;
    }

    /**
     * @param string $taxNumber
     */
    public function setTaxNumber($taxNumber) {

        $this->taxNumber = $taxNumber;
    }

    /**
     * @return string
     */
    public function getTaxOffice() {

        return $this->taxOffice;
    }

    /**
     * @param string $taxOffice
     */
    public function setTaxOffice($taxOffice) {

        $this->taxOffice = $taxOffice;
    }

    /**
     * @return string
     */
    public function getAddress() {

        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address) {

        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getZipCode() {

        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode($zipCode) {

        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getCity() {

        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city) {

        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState() {

        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state) {

        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getCountry() {

        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country) {

        $this->country = $country;
    }

    /**
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("fullName", $this->getFullName())
            ->add("company", $this->getCompany())
            ->add("identityNumber", $this->getIdentityNumber())
            ->add("taxNumber", $this->getTaxNumber())
            ->add("taxOffice", $this->getTaxOffice())
            ->add("address", $this->getAddress())
            ->add("zipCode", $this->getZipCode())
            ->add("city", $this->getCity())
            ->add("state", $this->getState())
            ->add("country", $this->getCountry())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}