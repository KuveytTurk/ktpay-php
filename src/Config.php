<?php

namespace KTPay;

class Config {

    public static $credentialsTest = [
        'serviceUrl'        => 'https://boatest.kuveytturk.com.tr/boa.virtualpos.services',
        'customerId'        => 0,
        'merchantId'        => 0,
        'username'          => '',
        'password'          => ''
    ];

    private static $credentialsProd = [
        'serviceUrl'        => 'https://sanalpos.kuveytturk.com.tr/ServiceGateWay',
        'customerId'        => 0,
        'merchantId'        => 0,
        'username'          => '',
        'password'          => ''
    ];

    private static $cardTest = [
        'cardHolderName'    => 'JOHN DOE',
        'cardNumber'        => '5188961939192544',
        'expireMonth'       => '06',
        'expireYear'        => '25',
        'securityCode'      => '929',
        'acsPass'           => '123456'
    ];

    private static $installmentCardTest = [
        'cardHolderName'    => 'JOHN DOE',
        'cardNumber'        => '4446763125813623',
        'expireMonth'       => '12',
        'expireYear'        => '26',
        'securityCode'      => '000',
        'acsPass'           => '123456'
    ];

    /**
     * @return array
     */
    public static function getTestCredentials() {

        return self::$credentialsTest;
    }

    /**
     * @return array
     */
    public static function getProdCredentials() {

        return self::$credentialsProd;
    }

    /**
     * @return array
     */
    public static function getTestCard() {

        return self::$cardTest;
    }

    /**
     * @return array
     */
    public static function getInstallmentTestCard() {

        return self::$installmentCardTest;
    }
}