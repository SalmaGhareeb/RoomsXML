<?php

namespace SalmaAbdelhady\RoomsXML\Service;

use SalmaAbdelhady\RoomsXML\Core\APIClient;
use SalmaAbdelhady\RoomsXML\Request\AvailabilityRequest;
use SalmaAbdelhady\RoomsXML\Request\BookingRequest;

class APIService
{
    /** @var \SalmaAbdelhady\RoomsXML\Core\APIClient $client */
    protected $client;

    const OPERATON_SEARCH = 'AvailabilitySearch';
    const OPERATON_BOOK   = 'BookingCreate';

    public function __construct()
    {
        $this->client = new APIClient();
    }

    /**
     * @param array $payload
     *
     * @return array
     * @throws \SalmaAbdelhady\RoomsXML\Exception\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function search(array $payload): array
    {
        $request = new AvailabilityRequest();
        $request->load($payload);

        return $this->client->call(self::OPERATON_SEARCH, $payload);
    }

    /**
     * @param array $payload
     *
     * @return array
     * @throws \SalmaAbdelhady\RoomsXML\Exception\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function book(array $payload): array
    {
        $request = new BookingRequest();
        $request->load($payload);

        return $this->client->call(self::OPERATON_BOOK, $payload);
    }

    /**
     * @param array $payload
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function cancel(array $payload): array
    {

        return [];
    }
}