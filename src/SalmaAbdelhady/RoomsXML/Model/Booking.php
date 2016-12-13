<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 2/9/16
 * Time: 5:57 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Booking
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("Booking")
 */
class Booking
{
    /**
     * @var booking creation date
     * @Type(name="DateTime<'Y-m-d'>")
     * @SerializedName("CreationDate")
     */
    protected $CreationDate;

    /**
     * @var hotel booking details 
     * @SerializedName("HotelBooking")
     * @XmlList(inline=true,entry="HotelBooking")
     * @XmlElement(cdata=false)
     * @Type(name="array<SalmaAbdelhady\RoomsXML\Model\HotelBooking>")
     * @SerializedName("HotelBooking")
     */
    protected $HotelBooking;

    /**
     * get booking creating date
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->CreationDate;
    }

    /**
     * set booking creation date
     *
     * @param $CreationDate
     */
    public function setCreationDate($CreationDate)
    {
        $this->CreationDate = $CreationDate;
    }

    /**
     * Get hotel booking object
     *
     *
     * @return HotelBooking
     */
    public function getHotelBooking()
    {
        return $this->HotelBooking;
    }

    /**
     * HotelBooking setter
     *
     * @param HotelBooking $HotelBooking
     */
    public function setHotelBooking($HotelBooking)
    {
        $this->HotelBooking = $HotelBooking;
    }

}