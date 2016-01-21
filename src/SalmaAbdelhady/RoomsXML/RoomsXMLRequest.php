<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 7/28/15
 * Time: 10:52 AM
 */

namespace SalmaAbdelhady\RoomsXML;


use Buzz\Client\Curl;

/**
 * Class RoomsXMLRequest
 * @package SalmaAbdelhady\RoomsXML
 */
class RoomsXMLRequest
{
    protected $config;
    protected $apiURL;

    /**
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }


    /**
     * @param $payload
     * @return string
     * @throws RoomsXMLException
     */
    public function sendRequest($payload)
    {
    }


    /**
     * @return Curl
     */
    private function initCurl($postData)
    {
        $ch = new Curl();

        $ch->setOption(CURLOPT_URL, $this->apiURL);
        $ch->setOption(CURLOPT_HEADER, 1);
        $ch->setOption(CURLOPT_VERBOSE, 0);
        $ch->setOption(CURLOPT_SSL_VERIFYHOST, 0); //ssl stuff
        $ch->setOption(CURLOPT_SSL_VERIFYPEER, 0);
        $ch->setOption(CURLOPT_POST, 1);
        $ch->setOption(CURLOPT_HTTPHEADER, array('Content-Type:  application/x-www-form-urlencoded'));
        $ch->setOption(CURLOPT_POSTFIELDS, $postData);
        $ch->setOption(CURLOPT_RETURNTRANSFER, 1);
        $ch->setTimeout(30);

        return $ch;
    }


}