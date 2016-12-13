<?php

/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/21/16
 * Time: 10:02 PM
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
 * Class AvailabilitySearch
 * @package SalmaAbdelhady\RoomsXML\Operations
 * @XmlRoot(name="AvailabilitySearch")
 */
class AvailabilitySearch extends RoomsXMLRequest
{


    /**
     * @XmlElement(cdata=false)
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\HotelSearchCriteria")
     * @SerializedName("HotelSearchCriteria")
     */
    private $hotelSearchCriteria;

    /**
     * @XmlElement(cdata=false)
     * @SerializedName("RegionId")
     * @Type(name="integer")
     */
    private $RegionId;

    /**
     * @XmlElement(cdata=false)
     * @SerializedName("HotelId")
     * @Type(name="integer")
     */
    private $HotelId;

    /**
     * @XmlElement(cdata=false)
     * @SerializedName("CustomDetailLevel")
     * @Type(name="string")
     */
    private $CustomDetailLevel;

    /**
     * @XmlElement(cdata=false)
     * @SerializedName("DetailLevel")
     * @Type(name="string")
     */
    private $DetailLevel;

    /**
     * @XmlElement(cdata=false)
     * @SerializedName("MaxResultsPerHotel")
     * @Type(name="integer")
     */
    private $MaxResultsPerHotel;

    /**
     * @XmlElement(cdata=false)
     * @SerializedName("MaxHotels")
     * @Type(name="integer")
     */
    private $MaxHotels;

    /**
     * @XmlElement(cdata=false)
     * @SerializedName("MaxSearchTime")
     * @Type(name="integer")
     */
    private $MaxSearchTime;

    /**
     * @param $payLoad
     * @return array
     */
    public function checkAvailability($payLoad)
    {
        $hotelDetails = new HotelStayDetails();
        $hotelDetails->setArrivalDate(new \DateTime($payLoad['arrivalDate']));
        $hotelDetails->setNationality($payLoad['nationality']);
        $hotelDetails->setNights($payLoad['nights']);

        foreach ($payLoad['rooms'] as $room) {
            $hotelRoom = new Room();
            $guests    = new Guests();

            for ($i = 0; $i < $room['adult']; $i++) {
                $guests->addAdult(new Person());
            }
            for ($i = 0; $i < $room['child']; $i++) {
                $ch = new Person();
                $ch->setAge($room['child_ages'][$i]);
                $guests->addChild($ch);
            }
            $hotelRoom->setGuests($guests);
            $hotelDetails->addRoom($hotelRoom);
        }
        if (isset($payLoad['regionId'])) {
            $this->setRegionId($payLoad['regionId']);
        }
        if (isset($payLoad['hotelId'])) {
            $this->setHotelId($payLoad['hotelId']);
        }
        $this->setAuthority($this->auth);
        $this->setHotelStayDetails($hotelDetails);
        $this->setMaxSearchTime(60);
        $this->setMaxHotels(50);
        $this->setDetailLevel("full");
        $this->operationData = $this;
        $content             = $this->sendRequest();
        return $this->getResponse($content, 'SalmaAbdelhady\RoomsXML\Results\AvailabilitySearchResult');
    }

    /**
     * @return mixed
     */
    public function getRegionId()
    {
        return $this->RegionId;
    }

    /**
     * @param mixed $RegionId
     */
    public function setRegionId($RegionId)
    {
        $this->RegionId = $RegionId;
    }

    /**
     * @return mixed
     */
    public function getHotelId()
    {
        return $this->HotelId;
    }

    /**
     * @param mixed $HotelId
     */
    public function setHotelId($HotelId)
    {
        $this->HotelId = $HotelId;
    }

    /**
     * @return mixed
     */
    public function getCustomDetailLevel()
    {
        return $this->CustomDetailLevel;
    }

    /**
     * @param mixed $CustomDetailLevel
     */
    public function setCustomDetailLevel($CustomDetailLevel)
    {
        $this->CustomDetailLevel = $CustomDetailLevel;
    }

    /**
     * @return mixed
     */
    public function getMaxResultsPerHotel()
    {
        return $this->MaxResultsPerHotel;
    }

    /**
     * @param mixed $MaxResultsPerHotel
     */
    public function setMaxResultsPerHotel($MaxResultsPerHotel)
    {
        $this->MaxResultsPerHotel = $MaxResultsPerHotel;
    }

    /**
     * @return mixed
     */
    public function getMaxHotels()
    {
        return $this->MaxHotels;
    }

    /**
     * @param mixed $MaxHotels
     */
    public function setMaxHotels($MaxHotels)
    {
        $this->MaxHotels = $MaxHotels;
    }

    /**
     * @return mixed
     */
    public function getMaxSearchTime()
    {
        return $this->MaxSearchTime;
    }

    /**
     * @param mixed $MaxSearchTime
     */
    public function setMaxSearchTime($MaxSearchTime)
    {
        $this->MaxSearchTime = $MaxSearchTime;
    }

    /**
     * @return mixed
     */
    public function getHotelSearchCriteria()
    {
        return $this->hotelSearchCriteria;
    }

    /**
     * @param mixed $hotelSearchCriteria
     */
    public function setHotelSearchCriteria($hotelSearchCriteria)
    {
        $this->hotelSearchCriteria = $hotelSearchCriteria;
    }

    /**
     * @return mixed
     */
    public function getDetailLevel()
    {
        return $this->DetailLevel;
    }

    /**
     * @param mixed $DetailLevel
     */
    public function setDetailLevel($DetailLevel)
    {
        $this->DetailLevel = $DetailLevel;
    }

}