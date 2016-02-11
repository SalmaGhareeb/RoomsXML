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
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Booking
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("Booking")
 */
class Booking
{
    /**
     * @var
     * @Type(name="DateTime<'Y-m-d'>")
     * @SerializedName("CreationDate")
     */
    protected $CreationDate;

    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\HotelBooking")
     * @SerializedName("HotelBooking")
     */
    protected $HotelBooking;




    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->CreationDate;
    }

    /**
     * @param mixed $CreationDate
     */
    public function setCreationDate($CreationDate)
    {
        $this->CreationDate = $CreationDate;
    }

    /**
     * @return mixed
     */
    public function getHotelBooking()
    {
        return $this->HotelBooking;
    }

    /**
     * @param mixed $HotelBooking
     */
    public function setHotelBooking($HotelBooking)
    {
        $this->HotelBooking = $HotelBooking;
    }



}