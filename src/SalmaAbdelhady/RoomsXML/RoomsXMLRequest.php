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
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
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
     * @XmlElement(cdata=false)
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\HotelStayDetails")
     * @SerializedName("HotelStayDetails")
     */
    public $HotelStayDetails;

    /**
     * @XmlElement(cdata=false)
     * @Type(name="SalmaAbdelhady\RoomsXML\RoomsXMLAuthentication")
     * @SerializedName("Authority")
     */
    public $authority;


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
     * @param string $content
     * @param string $model
     * @return array
     */
    public function getResponse($content, $model)
    {
        $serializer = SerializerBuilder::create()->build();
        $response   = $serializer->deserialize($content, $model, 'xml');


        return $response;
    }


    /**
     * @param string $postData
     * @return Curl
     */
    private function initCurl($postData)
    {
        $ch = new Curl();

        $ch->setOption(CURLOPT_URL, $this->apiURL);
        $ch->setOption(CURLOPT_HEADER, 1);
        $ch->setOption(CURLOPT_VERBOSE, 0);
        $ch->setOption(CURLOPT_SSL_VERIFYHOST, 0); //ssl stuff
        $ch->setOption(CURLOPT_SSL_VERIFYPEER, 1);
        $ch->setOption(CURLOPT_POST, 1);
        $ch->setOption(CURLOPT_HTTPHEADER, array('Content-Type:  text/xml'));
        $ch->setOption(CURLOPT_POSTFIELDS, $postData);
        $ch->setOption(CURLOPT_RETURNTRANSFER, 1);
        $ch->setTimeout(100);

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

    /**
     * @return mixed
     */
    public function getHotelStayDetails()
    {
        return $this->hotelStayDetails;
    }

    /**
     * @param Model\HotelStayDetails $hotelStayDetails
     */
    public function setHotelStayDetails($hotelStayDetails)
    {
        $this->hotelStayDetails = $hotelStayDetails;
    }

    /**
     * @return mixed
     */
    public function getAuthority()
    {
        return $this->authority;
    }

    /**
     * @param RoomsXMLAuthentication $authority
     */
    public function setAuthority($authority)
    {
        $this->authority = $authority;
    }


}
