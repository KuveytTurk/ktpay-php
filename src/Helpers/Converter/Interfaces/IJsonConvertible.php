<?php

namespace KTPay\Helpers\Converter\Interfaces;

interface IJsonConvertible {

    public function toJSONObject();
    public function toJSONString();
}