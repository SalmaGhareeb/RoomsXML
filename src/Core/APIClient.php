<?php

namespace SalmaAbdelhady\RoomsXML\Core;

use GuzzleHttp\Client;
use Spatie\ArrayToXml\ArrayToXml;

class APIClient
{
    /** @var \GuzzleHttp\Client|null $client */
    protected $client;

    private $options;

    public function __construct()
    {
        $this->client  = new Client();
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

        $xmlPayload            = ArrayToXml::convert($payload, [
                'rootElementName' => $operation,
            ]
        );
        $this->options['body'] = $xmlPayload;

        $response = $this->client->post('http://www.roomsxmldemo.com/RXLStagingServices/ASMX/XmlService.asmx', $this->options);

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
            'Org'       => 'fllc',
            'User'      => 'xmltest',
            'Password'  => 'xmltest',
            'Version'   => '1.25',
            'Currency'  => 'USD',
            'Language'  => 'en',
            'TestMode'  => true,
        ]];
    }
}