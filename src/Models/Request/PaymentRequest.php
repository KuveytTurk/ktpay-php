<?php

namespace KTPay\Models\Request;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;
use KTPay\Helpers\Converter\JsonConverter;
use KTPay\Helpers\KTPayHelper;
use KTPay\Models\Card;
use KTPay\Models\Customer;
use KTPay\Models\InvoiceAddress;
use KTPay\Models\ShippingAddress;

class PaymentRequest implements IJsonConvertible {

    private $paymentType;
    private $language;
    private $merchantOrderId;
    private $successUrl;
    private $failUrl;
    private $merchantId;
    private $customerId;
    private $username;
    private $hashData;
    private $amount;
    private $currency;
    private $installmentCount;
    private $customer;
    private $card;
    private $invoiceAddress;
    private $shippingAddress;
    private $cart;

    /**
     * @return integer
     */
    public function getPaymentType() {

        return $this->paymentType;
    }

    /**
     * @param integer $paymentType
     */
    public function setPaymentType($paymentType) {

        $this->paymentType = $paymentType;
    }

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
    public function getSuccessUrl() {

        return $this->successUrl;
    }

    /**
     * @param string $successUrl
     */
    public function setSuccessUrl($successUrl) {

        $this->successUrl = $successUrl;
    }

    /**
     * @return string
     */
    public function getFailUrl() {

        return $this->failUrl;
    }

    /**
     * @param string $failUrl
     */
    public function setFailUrl($failUrl) {

        $this->failUrl = $failUrl;
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
     * @return string
     */
    public function getCurrency() {

        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency) {

        $this->currency = $currency;
    }

    /**
     * @return integer
     */
    public function getInstallmentCount() {

        return $this->installmentCount;
    }

    /**
     * @param integer $installmentCount
     */
    public function setInstallmentCount($installmentCount) {

        $this->installmentCount = $installmentCount;
    }

    /**
     * @return Customer
     */
    public function getCustomer() {

        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer($customer) {

        $this->customer = $customer;
    }

    /**
     * @return Card
     */
    public function getCard() {
        return $this->card;
    }

    /**
     * @param Card $card
     */
    public function setCard($card) {

        $this->card = $card;
    }

    /**
     * @return InvoiceAddress
     */
    public function getInvoiceAddress() {

        return $this->invoiceAddress;
    }

    /**
     * @param InvoiceAddress $invoiceAddress
     */
    public function setInvoiceAddress($invoiceAddress) {

        $this->invoiceAddress = $invoiceAddress;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress() {

        return $this->shippingAddress;
    }

    /**
     * @param ShippingAddress $shippingAddress
     */
    public function setShippingAddress($shippingAddress) {

        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return array
     */
    public function getCart() {

        return $this->cart;
    }

    /**
     * @param array $cart
     */
    public function setCart($cart) {

        $this->cart = $cart;
    }

    /**
     * @param $password
     */
    public function setHashData($password) {

        $hashPassword = KTPayHelper::hashPassword($password);
        $hashStr = $this->merchantId . $this->merchantOrderId . $this->amount . $this->successUrl . $this->failUrl . $this->username . $hashPassword;
        $this->hashData = KTPayHelper::computeHash($hashStr, $hashPassword);
    }

    /**
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("paymentType", $this->getPaymentType())
            ->add("language", $this->getLanguage())
            ->add("merchantOrderId", $this->getMerchantOrderId())
            ->add("successUrl", $this->getSuccessUrl())
            ->add("failUrl", $this->getFailUrl())
            ->add("merchantId", $this->getMerchantId())
            ->add("customerId", $this->getCustomerId())
            ->add("username", $this->getUsername())
            ->add("hashData", $this->getHashData())
            ->add("amount", $this->getAmount())
            ->add("currency", $this->getCurrency())
            ->add("installmentCount", $this->getInstallmentCount())
            ->add("customer", $this->getCustomer())
            ->add("card", $this->getCard())
            ->add("invoiceAddress", $this->getInvoiceAddress())
            ->add("shippingAddress", $this->getShippingAddress())
            ->addArray("cart", $this->getCart())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}