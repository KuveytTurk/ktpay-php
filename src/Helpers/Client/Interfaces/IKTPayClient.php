<?php

namespace KTPay\Helpers\Client\Interfaces;

interface IKTPayClient {

    public function get($url, $headers);
    public function post($url, $headers, $data);
}