<?php

namespace KTPay\Models;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;
use KTPay\Helpers\Converter\JsonConverter;

class Phone implements IJsonConvertible {

    private $cc;
    private $subscriber;

    /**
     * @return string
     */
    public function getCc() {

        return $this->cc;
    }

    /**
     * @param string $cc
     */
    public function setCc($cc) {

        $this->cc = $cc;
    }

    /**
     * @return string
     */
    public function getSubscriber() {

        return $this->subscriber;
    }

    /**
     * @param string $subscriber
     */
    public function setSubscriber($subscriber) {

        $this->subscriber = $subscriber;
    }

    /**
     * @return JsonConverter
     */
    public function toJSONObject() {

        return JsonConverter::create()
            ->add("cc", $this->getCc())
            ->add("subscriber", $this->getSubscriber())
            ->getObject();
    }

    /**
     * @return false|string
     */
    public function toJSONString() {

        return JsonConverter::jsonEncode($this->toJSONObject());
    }
}