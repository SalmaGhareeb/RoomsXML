<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/30/16
 * Time: 8:57 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class HotelAvailability
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("HotelAvailability")
 */
class HotelAvailability
{
    /**
     * @var
     * @SerializedName("Hotel")
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\Hotel")
     */
    private $hotel;

    /**
     * @var
     * @XmlElement(cdata=false)
     * @Type(name="array<SalmaAbdelhady\RoomsXML\Model\Result>")
     * @XmlList(inline = true, entry = "Result")
     * @SerializedName("Result")
     */
    private $results;


    /**
     * @return mixed
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * @param mixed $hotel
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
    }

}