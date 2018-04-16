<?php

namespace SalmaAbdelhady\RoomsXML\Results;

use SalmaAbdelhady\RoomsXML\RoomsXMLResponse;

/**
 * Class AvailabilitySearchResult
 */
class AvailabilitySearchResult extends RoomsXMLResponse
{

    /** @var array */
    private $response;

    /**
     * AvailabilitySearchResult constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * @return array
     */
    public function getHotelAvailability(): array
    {
        return $this->response['HotelAvailability'] ?? [];
    }
}