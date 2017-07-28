<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/21/16
 * Time: 10:09 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class HotelSearchCriteria
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot(name="HotelSearchCriteria")
 */
class HotelSearchCriteria
{
    /**
     * @var
     * @SerializedName("HotelName")
     * @Type("string")
     */
    private $HotelName;

    /**
     * @var
     * @SerializedName("HotelType")
     * @Type("string")
     */
    private $HotelType;

    /**
     * @var
     * @SerializedName("MinStars")
     * @Type("integer")
     */
    private $MinStars;

    /**
     * @var
     * @SerializedName("MinPrice")
     * @Type("double")
     */
    private $MinPrice;


    /**
     * @var
     * @SerializedName("MaxPrice")
     * @Type("double")
     */
    private $MaxPrice;

    /**
     * @var
     * @SerializedName("AvailabilityStatus")
     * @Type("string")
     */
    private $AvailabilityStatus;
    /**
     * @var
     * @SerializedName("DetailLevel")
     * @Type("string")
     */
    private $DetailLevel;

    /**
     * @return mixed
     */
    public function getHotelName()
    {
        return $this->HotelName;
    }

    /**
     * @param mixed $HotelName
     */
    public function setHotelName($HotelName)
    {
        $this->HotelName = $HotelName;
    }

    /**
     * @return mixed
     */
    public function getHotelType()
    {
        return $this->HotelType;
    }

    /**
     * @param mixed $HotelType
     */
    public function setHotelType($HotelType)
    {
        $this->HotelType = $HotelType;
    }

    /**
     * @return mixed
     */
    public function getMinStars()
    {
        return $this->MinStars;
    }

    /**
     * @param mixed $MinStars
     */
    public function setMinStars($MinStars)
    {
        $this->MinStars = $MinStars;
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->MinPrice;
    }

    /**
     * @param mixed $MinPrice
     */
    public function setMinPrice($MinPrice)
    {
        $this->MinPrice = $MinPrice;
    }

    /**
     * @return mixed
     */
    public function getMaxPrice()
    {
        return $this->MaxPrice;
    }

    /**
     * @param mixed $MaxPrice
     */
    public function setMaxPrice($MaxPrice)
    {
        $this->MaxPrice = $MaxPrice;
    }

    /**
     * @return mixed
     */
    public function getAvailabilityStatus()
    {
        return $this->AvailabilityStatus;
    }

    /**
     * @param mixed $AvailabilityStatus
     */
    public function setAvailabilityStatus($AvailabilityStatus)
    {
        $this->AvailabilityStatus = $AvailabilityStatus;
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