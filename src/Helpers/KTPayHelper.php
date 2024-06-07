<?php

namespace KTPay\Helpers;

class KTPayHelper {

    /**
     * @param $password
     * @return string
     */
    public static function hashPassword($password) {

        return base64_encode(hash('sha1', utf8_encode($password), true));
    }

    /**
     * @param $data
     * @param $key
     * @return string
     */
    public static function computeHash($data, $key) {

        $bytes = utf8_encode($data);
        $hashString = hash_hmac('sha512', $bytes, utf8_encode($key), true);
        return base64_encode($hashString);
    }

    /**
     * @return empty|string
     */
    public static function getClientIP() {

        $clientIP = '';

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['CLIENT_IP'])) {

            $clientIP = $_SERVER['CLIENT_IP'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {

            $clientIP = $_SERVER['REMOTE_ADDR'];
        }

        return $clientIP;
    }

    /**
     * @return bool
     */
    public static function isHttps() {

        if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {

            return true;
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https') {

            return true;
        } elseif (!empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {

            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public static function getURL() {

        return (self::isHttps() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }
}