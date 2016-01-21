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
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class AvailabilitySearch
 * @package SalmaAbdelhady\RoomsXML\Operations
 * @XmlRoot(name="AvailabilitySearch")
 */
class AvailabilitySearch
{
    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\RoomsXMLAuthentication")
     */
    private $authority;

    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\HotelStayDetails")
     * @SerializedName(name="HotelStayDetails")
     */
    private $hotelStayDetails;

    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\HotelSearchCriteria")
     * @SerializedName(name="HotelSearchCriteria")
     */
    private $hotelSearchCriteria;

    /**
     * @var
     * @SerializedName(name="RegionId")
     * @Type(name="integer")
     */
    private $RegionId;

    /**
     * @var
     * @SerializedName(name="HotelId")
     * @Type(name="integer")
     */
    private $HotelId;

    /**
     * @var
     * @SerializedName(name="CustomDetailLevel")
     * @Type(name="string")
     */
    private $CustomDetailLevel;

    /**
     * @var
     * @SerializedName(name="MaxResultsPerHotel")
     * @Type(name="integer")
     */
    private $MaxResultsPerHotel;

    /**
     * @var
     * @SerializedName(name="MaxHotels")
     * @Type(name="integer")
     */
    private $MaxHotels;

    /**
     * @var
     * @SerializedName(name="MaxSearchTime")
     * @Type(name="integer")
     */
    private $MaxSearchTime;

    /**
     * @return mixed
     */
    public function getAuthority()
    {
        return $this->authority;
    }

    /**
     * @param mixed $authority
     */
    public function setAuthority($authority)
    {
        $this->authority = $authority;
    }

    /**
     * @return mixed
     */
    public function getHotelStayDetails()
    {
        return $this->hotelStayDetails;
    }

    /**
     * @param mixed $hotelStayDetails
     */
    public function setHotelStayDetails($hotelStayDetails)
    {
        $this->hotelStayDetails = $hotelStayDetails;
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


}