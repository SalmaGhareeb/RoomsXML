<?php

namespace SalmaAbdelhady\RoomsXML\Request;

/**
 * Class BookingRequest
 *
 * @package SalmaAbdelhady\RoomsXML\Request
 */
class BookingRequest extends AbstractRequest
{
    public $rules = [
        'QuoteId'                      => 'string',
        'HotelStayDetails.Nationality' => 'required|string',
        'HotelStayDetails.Room'        => 'required|array',
        'CommitLevel'                  => 'string',
        'AgentReference'               => 'string|nullable',
    ];

    public $attributes = [
        'QuoteId',
        'CommitLevel',
        'AgentReference',
        'HotelStayDetails'
    ];

    /**
     * @var
     */
    public $QuoteId;


    /**
     * @var
     */
    public $BookingId;

    /**
     * @var
     */
    public $AgentReference;

    /**
     * @var
     */
    public $CommitLevel;

    public $HotelStayDetails;

    /**
     * @return mixed
     */
    public function getQuoteId()
    {
        return $this->QuoteId;
    }

    /**
     * @param mixed $QuoteId
     */
    public function setQuoteId($QuoteId)
    {
        $this->QuoteId = $QuoteId;
    }

    /**
     * @return mixed
     */
    public function getBookingId()
    {
        return $this->BookingId;
    }

    /**
     * @param mixed $BookingId
     */
    public function setBookingId($BookingId)
    {
        $this->BookingId = $BookingId;
    }

    /**
     * @return mixed
     */
    public function getAgentReference()
    {
        return $this->AgentReference;
    }

    /**
     * @param mixed $AgentReference
     */
    public function setAgentReference($AgentReference)
    {
        $this->AgentReference = $AgentReference;
    }

    /**
     * @return mixed
     */
    public function getCommitLevel()
    {
        return $this->CommitLevel;
    }

    /**
     * @param mixed $CommitLevel
     */
    public function setCommitLevel($CommitLevel)
    {
        $this->CommitLevel = $CommitLevel;
    }

    /**
     * @return mixed
     */
    public function getHotelStayDetails()
    {
        return $this->HotelStayDetails;
    }

    /**
     * @param mixed $HotelStayDetails
     */
    public function setHotelStayDetails($HotelStayDetails)
    {
        $this->HotelStayDetails = $HotelStayDetails;
    }
}