<?php

namespace SalmaAbdelhady\RoomsXML\Core;

use GuzzleHttp\Client;
use Spatie\ArrayToXml\ArrayToXml;

class APIClient
{

    const LIVE_URL    = 'http://www.roomsxml.com/RXLServices/ASMX/XmlService.asmx';
    const SANDBOX_URL = 'http://www.roomsxmldemo.com/RXLStagingServices/ASMX/XmlService.asmx';

    /** @var \GuzzleHttp\Client|null $client */
    protected $client;

    private $options;
    private $url;

    public function __construct()
    {
        $this->client  = new Client();
        $this->url     = getenv('ROOMSXML_TEST_MODE') ? self::SANDBOX_URL : self::LIVE_URL;
        $this->options = ['headers' => [
            'Accept-Encoding' => 'gzip,deflate',
            'Content-Type'    => 'text/xml; charset=UTF8'],
        ];

    }

    /**
     * @param string $operation
     * @param array  $payload
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function call(string $operation, array $payload): array
    {
        $payload = array_merge($this->getAuthDetails(), $payload);

        $xmlPayload = ArrayToXml::convert($payload, [
                'rootElementName' => $operation,
            ]
        );

        $this->options['body'] = $xmlPayload;

        $response = $this->client->post($this->url, $this->options);

        return $this->transform($response->getBody()->getContents());
    }


    /**
     * @param string $content
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function transform(string $content): array
    {
        $xml = simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);

        return json_decode(json_encode($xml), true);
    }


    public function getAuthDetails(): array
    {
        return ['Authority' => [
            'Org'       => getenv('ROOMSXML_ACCOUNT_ORG'),
            'User'      => getenv('ROOMSXML_ACCOUNT_USER'),
            'Password'  => getenv('ROOMSXML_ACCOUNT_PASSWORD'),
            'Version'   => '1.26',
            'Currency'  => getenv('ROOMSXML_ACCOUNT_CURRENCY'),
            'Language'  => 'en',
            'TestMode'  => getenv('ROOMSXML_TEST_MODE'),
            'DebugMode' => getenv('ROOMSXML_DEBUG_MODE'),
        ]];
    }
}