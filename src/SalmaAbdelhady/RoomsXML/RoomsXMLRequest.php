<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 7/28/15
 * Time: 10:52 AM
 */

namespace SalmaAbdelhady\RoomsXML;


use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Message\Response;
use JMS\Serializer\SerializerBuilder;
use SalmaAbdelhady\RoomsXML\Model\Error;


/**
 * Class RoomsXMLRequest
 * @package SalmaAbdelhady\RoomsXML
 */
class RoomsXMLRequest
{
    protected $config;
    protected $apiURL;
    protected $auth;

    public $operationData;


    /**
     * @param $config
     */
    public function __construct($config)
    {
        $this->auth = new RoomsXMLAuthentication();

        $this->auth->setCurrency($config['currency']);
        $this->auth->setOrg($config['org']);
        $this->auth->setTestMode($config['test']);
        $this->auth->setUserName($config['username']);
        $this->auth->setPassword($config['password']);
        $this->auth->setVersion($config['api_version']);
        $this->auth->setLanguage($config['lang']);
        $this->apiURL = $config['api_url'];
    }


    /**
     * @param $payload
     * @return string
     * @throws RoomsXMLException
     */
    public function sendRequest()
    {
        $serializer = SerializerBuilder::create()->build();
        $data       = $serializer->serialize($this->operationData, 'xml');
        $cURL       = $this->initCurl($data);
        $browser    = new Browser($cURL);
        $response   = $browser->post($this->apiURL);
        $this->verifyResponse($response);

        return $response->getContent();
    }

    /**
     * @return array
     */
    public function getResponse($content, $model)
    {
        $serializer = SerializerBuilder::create()->build();
        $response   = $serializer->deserialize($content, $model, 'xml');
        $result     = new RoomsXMLResponse($response);

        return $result->getResponse();
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
        $ch->setOption(CURLOPT_HTTPHEADER, array('Content-Type:  text/xml'));
        $ch->setOption(CURLOPT_POSTFIELDS, $postData);
        $ch->setOption(CURLOPT_RETURNTRANSFER, 1);
        $ch->setTimeout(30);

        return $ch;
    }

    /**
     * @param Response $response
     * @throws RoomsXMLException
     */
    private function verifyResponse(Response $response)
    {
        if ($response->getContent()) {
            $serializer = SerializerBuilder::create()->build();
            /** @var Error $error */
            $error = $serializer->deserialize($response->getContent(), 'SalmaAbdelhady\RoomsXML\Model\Error', 'xml');
            if ($error->getCode()) {
                throw new RoomsXMLException($error->getDescription(), $error->getCode());
            }
        }
    }


}
