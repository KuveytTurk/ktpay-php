<?php

namespace KTPay\Helpers\Converter;

use KTPay\Helpers\Converter\Interfaces\IJsonConvertible;

class JsonConverter {

    private $json;

    function __construct($json) {
        $this->json = $json;
    }

    /**
     * @return JsonConverter
     */
    public static function create() {

        return new JsonConverter(array());
    }

    /**
     * @param $json
     * @return JsonConverter
     */
    public static function fromJSONObject($json) {

        return new JsonConverter($json);
    }

    /**
     * @param $key
     * @param $value
     * @return JsonConverter
     */
    public function add($key, $value = null) {

        if (isset($value)) {
            if ($value instanceof IJsonConvertible) {
                $this->json[$key] = $value->toJSONObject();
            } else {
                $this->json[$key] = $value;
            }
        }

        return $this;
    }

    /**
     * @param $key
     * @param array $array
     * @return JsonConverter
     */
    public function addArray($key, array $array = null) {

        if (isset($array)) {
            foreach ($array as $index => $value) {
                if ($value instanceof IJsonConvertible) {
                    $this->json[$key][$index] = $value->toJSONObject();
                } else {
                    $this->json[$key][$index] = $value;
                }
            }
        }

        return $this;
    }

    /**
     * @return JsonConverter
     */
    public function getObject() {

        return $this->json;
    }

    /**
     * @param $jsonObject
     * @return false|string
     */
    public static function jsonEncode($jsonObject) {

        return json_encode($jsonObject);
    }

    /**
     * @param $rawResult
     * @return JsonConverter
     */
    public static function jsonDecode($rawResult) {

        return json_decode($rawResult);
    }
}