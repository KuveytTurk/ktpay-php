<?php

namespace KTPay\Models;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;
use KTPay\Helpers\Converter\JsonConverter;

class CartItem implements IJsonConvertible {

    private $cartItemName;
    private $cartItemUrl;
    private $cartItemType;
    private $quantity;
    private $price;
    private $totalAmount;

    /**
     * @return string
     */
    public function getCartItemName() {

        return $this->cartItemName;
    }

    /**
     * @param string $cartItemName
     */
    public function setCartItemName($cartItemName) {

        $this->cartItemName = $cartItemName;
    }

    /**
     * @return string
     */
    public function getCartItemUrl() {

        return $this->cartItemUrl;
    }

    /**
     * @param string $cartItemUrl
     */
    public function setCartItemUrl($cartItemUrl) {

        $this->cartItemUrl = $cartItemUrl;
    }

    /**
     * @return int
     */
    public function getCartItemType() {

        return $this->cartItemType;
    }

    /**
     * @param int $cartItemType
     */
    public function setCartItemType($cartItemType) {

        $this->cartItemType = $cartItemType;
    }

    /**
     * @return float
     */
    public function getQuantity() {

        return $this->quantity;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity($quantity) {

        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getPrice() {

        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price) {

        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getTotalAmount() {

        return $this->totalAmount;
    }

    /**
     * @param string $totalAmount
     */
    public function setTotalAmount($totalAmount) {

        $this->totalAmount = $totalAmount;
    }

    /**
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("cartItemName", $this->getCartItemName())
            ->add("cartItemUrl", $this->getCartItemUrl())
            ->add("cartItemType", $this->getCartItemType())
            ->add("quantity", $this->getQuantity())
            ->add("price", $this->getPrice())
            ->add("totalAmount", $this->getTotalAmount())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}