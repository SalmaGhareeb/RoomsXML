<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 2/9/16
 * Time: 5:04 PM
 */

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
 * @package SalmaAbdelhady\RoomsXML\Operations
 * @XmlRoot("BookingCreate")
 */
class BookingCreate extends RoomsXMLRequest
{

    /**
     * @var
     * @SerializedName("QuoteId")
     * @Type(name="string")
     */
    private $QuoteId;

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
     */
    private $CommitLevel;


    /**
     * @param $payLoad
     * @return array
     */
    public function bookingCreate($payLoad)
    {
        $hotelDetails = new HotelStayDetails();
        $hotelDetails->setNationality($payLoad['nationality']);
        foreach ($payLoad['rooms'] as $room) {
            $hotelRoom = new Room();
            $guests    = new Guests();
            foreach ($room['guests'] as $guest) {
                if ($guest['type'] == 'Adult') {
                    $adult = new Person();
                    $adult->setFirst('Salma');
                    $adult->setTitle("Mr.");
                    $adult->setLast("Khaled");
                    $guests->addAdult($adult);
                } elseif ($guest['type'] == 'Child') {
                    $guests->addChild(new Person());
                }
            }
            $hotelRoom->setGuests($guests);
            $hotelDetails->addRoom($hotelRoom);
        }

        $this->setQuoteId("15252857-22");
        $this->setCommitLevel("prepare");
        $this->setAuthority($this->auth);
        $this->setHotelStayDetails($hotelDetails);
        $this->operationData = $this;
        $content             = $this->sendRequest();

        (dump($content));
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






}