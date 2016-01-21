<?php

namespace SalmaAbdelhady\RoomsXML\Model;


use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/21/16
 * Time: 10:08 PM
 * @XmlRoot(name="HotelStayDetails")
 */
class HotelStayDetails
{
    /**
     * @var
     * @SerializedName(name="ArrivalDate")
     * @Type(name="DateTime<YY-MM-d>")
     */
    private $ArrivalDate;

    /**
     * @var
     * @Type(name="integer")
     * @SerializedName(name="Nights")
     */
    private $Nights;
    /**
     * @var
     * @Type(name="string")
     * @SerializedName(name="Nationality")
     *
     */
    private $Nationality;

    /**
     * @var
     * @Type(name="ArrayCollection<SalmaAbdelhady/RoomsXML/Model/Room>")
     * @SerializedName(name="Room")
     * @XmlList(inline=true,entry="Room")
     */
    private $Rooms;

    public function __construct()
    {
        $this->Rooms = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getArrivalDate()
    {
        return $this->ArrivalDate;
    }

    /**
     * @param mixed $ArrivalDate
     */
    public function setArrivalDate($ArrivalDate)
    {
        $this->ArrivalDate = $ArrivalDate;
    }

    /**
     * @return mixed
     */
    public function getNights()
    {
        return $this->Nights;
    }

    /**
     * @param mixed $Nights
     */
    public function setNights($Nights)
    {
        $this->Nights = $Nights;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->Nationality;
    }

    /**
     * @param mixed $Nationality
     */
    public function setNationality($Nationality)
    {
        $this->Nationality = $Nationality;
    }

    /**
     * @return mixed
     */
    public function getRooms()
    {
        return $this->Rooms;
    }

    /**
     * @param mixed $Rooms
     */
    public function setRooms($Rooms)
    {
        $this->Rooms = $Rooms;
    }

    /**
     * @param Room $room
     */
    public function addRoom(Room $room)
    {
        $this->Rooms->add($room);
    }
}