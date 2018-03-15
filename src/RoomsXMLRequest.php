<?php

namespace SalmaAbdelhady\RoomsXML;

use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Message\Response;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\SerializerBuilder;
use SalmaAbdelhady\RoomsXML\Model\Error;
use SalmaAbdelhady\RoomsXML\Model\HotelStayDetails;


/**
 * Class RoomsXMLRequest
 *
 * @package SalmaAbdelhady\RoomsXML
 */
class RoomsXMLRequest
{
    protected $config;
    protected $apiURL;
    protected $auth;

    public $operationData;

    /**
     * @JMS\Type("SalmaAbdelhady\RoomsXML\RoomsXMLAuthentication")
     * @JMS\SerializedName("Authority")
     */
    public $authority;

    /**
     * @var HotelStayDetails
     * @JMS\Type("SalmaAbdelhady\RoomsXML\Model\HotelStayDetails")
     * @JMS\SerializedName("HotelStayDetails")
     */
    public $hotelStayDetails;


    /**
     * @param $config
     */
    public function __construct(RoomsXMLAuthentication $config)
    {
        $this->authority = $config;
        $this->apiURL    = getenv('API_URL');
    }


    /**
     * @return string
     * @throws RoomsXMLException
     */
    public function sendRequest(): string
    {
        $serializer = SerializerBuilder::create()->build();

        $data     = $serializer->serialize($this, 'xml');
        $cURL     = $this->initCurl($data);
        $browser  = new Browser($cURL);
        $response = $browser->post($this->apiURL);
        $this->verifyResponse($response);

        return $response->getContent();
    }

    /**
     * @param string $content
     * @param string $model
     *
     * @return object
     */
    public function getResponse(string $content, string $model): array
    {
        $serializer = SerializerBuilder::create()->build();
        $response   = $serializer->deserialize($content, $model, 'xml');

        return $response;
    }


    /**
     * @param string $postData
     *
     * @return Curl
     */
    private function initCurl(string $postData): Curl
    {
        $ch = new Curl();

        $ch->setOption(CURLOPT_URL, $this->apiURL);
        $ch->setOption(CURLOPT_HEADER, 1);
        $ch->setOption(CURLOPT_VERBOSE, 0);
        $ch->setOption(CURLOPT_SSL_VERIFYHOST, 0); //ssl stuff
        $ch->setOption(CURLOPT_SSL_VERIFYPEER, 1);
        $ch->setOption(CURLOPT_POST, 1);
        $ch->setOption(CURLOPT_HTTPHEADER, ['Content-Type:  text/xml']);
        $ch->setOption(CURLOPT_POSTFIELDS, $postData);
        $ch->setOption(CURLOPT_RETURNTRANSFER, 1);
        $ch->setOption(CURLOPT_ENCODING, 'gzip');
        $ch->setTimeout(100);

        return $ch;
    }

    /**
     * @param Response $response
     *
     * @throws RoomsXMLException
     */
    private function verifyResponse(Response $response): void
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
