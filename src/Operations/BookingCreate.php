<?php

namespace SalmaAbdelhady\RoomsXML\Operations;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlRoot;
use SalmaAbdelhady\RoomsXML\Model\Guests;
use SalmaAbdelhady\RoomsXML\Model\HotelStayDetails;
use SalmaAbdelhady\RoomsXML\Model\Person;
use SalmaAbdelhady\RoomsXML\Model\Room;
use SalmaAbdelhady\RoomsXML\RoomsXMLRequest;

/**
 * Class BookingCreate
 *
 * @package SalmaAbdelhady\RoomsXML\Operations
 * @XmlRoot("BookingCreate")
 */
class BookingCreate extends RoomsXMLRequest
{

    /**
     * @var
     * @SerializedName("QuoteId")
     * @Type(name="string")
     * @XmlElement(cdata=false)
     */
    private $QuoteId;


    /**
     * @var
     * @SerializedName("BookingId")
     * @Type(name="string")
     * @XmlElement(cdata=false)
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
     * @param array $payLoad
     *
     * @return array
     * @throws \SalmaAbdelhady\RoomsXML\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function create(array $payLoad): array
    {
        $hotelDetails = new HotelStayDetails();
        $hotelDetails->setNationality($payLoad['nationality']);
        foreach ($payLoad['rooms'] as $roomId => $room) {
            $hotelRoom = new Room();
            $guests    = new Guests();

            foreach ($payLoad['guests'] as $gKey => $guest) {
                if ($guest['room'] == $roomId) {
                    $g = new Person();
                    $g->setAge($guest['age']);
                    $g->setTitle($guest['title']);
                    $g->setFirst($guest['first']);
                    $g->setLast($guest['last']);
                    $addFunc = "add" . ucfirst($guest['type']);
                    $guests->$addFunc($g);
                }
            }
            $hotelRoom->setGuests($guests);
            $hotelDetails->addRoom($hotelRoom);
        }

        $this->setQuoteId($payLoad['quoteId']);
        $this->setCommitLevel($payLoad['commitLevel']);
        $this->setAuthority($this->auth);
        $this->setHotelStayDetails($hotelDetails);
        if (isset($payLoad['bookingId'])) {
            $this->setBookingId($payLoad['bookingId']);
        }

        $this->operationData = $this;
        $content             = $this->sendRequest();

        return $this->getResponse($content, 'SalmaAbdelhady\RoomsXML\Results\BookingCreateResult');
    }


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


}