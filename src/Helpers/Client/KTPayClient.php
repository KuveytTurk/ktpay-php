<?php

namespace KTPay\Helpers\Client;

use Exception;
use KTPay\Helpers\Client\Interfaces\IKTPayClient;

class KTPayClient implements IKTPayClient {

    private static $instance;
    private $curl;

    private function __construct() {

        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
    }

    /**
     * @return KTPayClient
     */
    public static function getInstance() {

        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $url
     * @param $headers
     * @return array
     * @throws Exception
     */
    public function get($url, $headers = []) {

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'GET');

        if(!empty($headers))
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);

        return $this->execute();
    }

    /**
     * @param $url
     * @param $headers
     * @param $data
     * @return array
     * @throws Exception
     */
    public function post($url, $headers = [], $data = []) {

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);

        if(!empty($headers))
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);

        return $this->execute();
    }

    /**
     * @return array
     * @throws Exception
     */
    protected function execute() {

        $response = curl_exec($this->curl);
        $httpCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        if ($response === false) {
            throw new Exception(curl_error($this->curl), curl_errno($this->curl));
        }

        return [
            'statusCode' => $httpCode,
            'body' => $response,
        ];
    }

    public function __destruct() {

        curl_close($this->curl);
    }
}