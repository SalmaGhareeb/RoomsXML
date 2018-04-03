<?php

namespace SalmaAbdelhady\RoomsXML\Model\Request;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;
use SalmaAbdelhady\RoomsXML\Model\Room;

/**
 * Hotel stay details sent to RoomsXML on search
 * @XmlRoot(name="HotelStayDetails")
 */
class HotelStayDetails
{
    /**
     * @var \DateTime tag
     * @XmlElement(cdata=false)
     * @SerializedName("ArrivalDate")
     * @Type(name="DateTime<'Y-m-d'>")
     */
    private $ArrivalDate;

    /**
     * @var int
     * @XmlElement(cdata=false)
     * @Type(name="integer")
     * @SerializedName("Nights")
     */
    private $Nights;

    /**
     * @var string tag
     * @XmlElement(cdata=false)
     * @Type(name="string")
     * @SerializedName("Nationality")
     *
     */
    private $Nationality;

    /**
     * @var array tag
     * @XmlElement(cdata=false)
     * @Type(name="array<SalmaAbdelhady\RoomsXML\Model\Room>")
     * @XmlList(inline = true, entry = "Room")
     * @SerializedName("Room")
     */
    private $Rooms;

    private $roomsDetails;

    /**
     * HotelStayDetails constructor.
     */
    public function __construct()
    {
        $this->Rooms = new ArrayCollection();
    }

    /**
     * get Arrival date
     *
     * @return \DateTime<'Y-m-d'>
     */
    public function getArrivalDate()
    {
        return $this->ArrivalDate;
    }

    /**
     * Set Arrival date
     *
     * @param \DateTime<'Y-m-d'> $ArrivalDate
     */
    public function setArrivalDate($ArrivalDate)
    {
        $this->ArrivalDate = $ArrivalDate;
    }

    /**
     * Return int
     *
     * @return integer
     */
    public function getNights()
    {
        return $this->Nights;
    }

    /**
     * Set nights
     *
     * @param integer $Nights
     */
    public function setNights($Nights)
    {
        $this->Nights = $Nights;
    }

    /**
     * Return customer nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->Nationality;
    }

    /**
     * Set customer nationality
     *
     * @param string $Nationality
     */
    public function setNationality($Nationality)
    {
        $this->Nationality = $Nationality;
    }

    /**
     * Return hotel details rooms
     *
     * @return ArrayCollection
     */
    public function getRooms()
    {
        return $this->Rooms;
    }

    /**
     *
     * Set Rooms tag
     *
     * @param ArrayCollection $Rooms
     */
    public function setRooms($Rooms)
    {
        $this->Rooms = $Rooms;
    }

    /**
     * Add room to Rooms tag
     *
     * @param Room $room
     */
    public function addRoom(Room $room): void
    {
        $this->Rooms->add($room);
    }

    /**
     * @return array
     */
    public function getRoomsDetails(): array
    {
        return $this->roomsDetails;
    }

    /**
     * @param mixed $roomsDetails
     */
    public function setRoomsDetails($roomsDetails)
    {
        $this->roomsDetails = $roomsDetails;
    }
}