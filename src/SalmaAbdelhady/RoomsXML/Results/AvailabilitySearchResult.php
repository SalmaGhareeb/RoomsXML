<?php


namespace SalmaAbdelhady\RoomsXML\Results;

/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/30/16
 * Time: 8:53 PM
 */
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class AvailabilitySearchResult
 * @XmlRoot(name="AvailabilitySearchResult")
 */
class AvailabilitySearchResult
{
    /**
     * @var
     * @SerializedName("Currency")
     * @Type(name="string")
     */
    private $currency;

    /**
     * @var
     * @SerializedName("TestMode")
     * @Type(name="string")
     */
    private $TestMode;

    /**
     * @XmlList(inline=true,entry="HotelAvailability")
     * @XmlElement(cdata=false)
     * @Type(name="array<SalmaAbdelhady\RoomsXML\Model\HotelAvailability>")
     * @SerializedName("HotelAvailability")
     */
    private $hotelAvailability;

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getTestMode()
    {
        return $this->TestMode;
    }

    /**
     * @param mixed $TestMode
     */
    public function setTestMode($TestMode)
    {
        $this->TestMode = $TestMode;
    }

    /**
     * @return mixed
     */
    public function getHotelAvailability()
    {
        return $this->hotelAvailability;
    }

    /**
     * @param mixed $hotelAvailability
     */
    public function setHotelAvailability($hotelAvailability)
    {
        $this->hotelAvailability = $hotelAvailability;
    }
}