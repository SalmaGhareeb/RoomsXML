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
        'HotelBooking'                 => 'array',
        'HotelStayDetails.ArrivalDate' => 'required|date|date_format:Y-m-d',
        'HotelStayDetails.Nights'      => 'required|integer',
        'HotelStayDetails.Nationality' => 'required|string',
        'HotelStayDetails.Room'        => 'required|array',
        'CommitLevel'                  => 'string',
        'AgentReference'               => 'string|nullable',
    ];

    public $attributes = [
        'QuoteId',
        'CommitLevel',
        'AgentReference',
    ];

    /**
     * @var
     */
    private $QuoteId;


    /**
     * @var
     */
    private $BookingId;

    /**
     * @var
     * @Type(name="string")
     * @SerializedName("AgentReference")
     */
    private $AgentReference;
    /**
     * @var
     * @Type(name="string")
     * @SerializedName("CommitLevel")
     * @XmlElement(cdata=false)
     */
    private $CommitLevel;

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
}