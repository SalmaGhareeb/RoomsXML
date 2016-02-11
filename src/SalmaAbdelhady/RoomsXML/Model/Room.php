<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/21/16
 * Time: 10:14 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Room
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot(name="Room")
 */
class Room
{
    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\Guests")
     * @SerializedName("Guests")
     */
    private $guests;

    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\RoomType")
     * @SerializedName("RoomType")
     */
    private $roomType;

    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\MealType")
     * @SerializedName("MealType")
     */
    private $mealType;

    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\Price")
     * @SerializedName("Price")
     */
    private $price;


    /**
     * @var
     * @SerializedName("TotalSellingPrice")
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\TotalSellingPrice")
     */
    protected $TotalSellingPrice;


    /**
     * @var
     * @XmlList(inline=true,entry="Message")
     * @XmlElement(cdata=false)
     * @Type(name="array<SalmaAbdelhady\RoomsXML\Model\Message>")
     * @SerializedName("Messages")
     */
    private $Messages;

    /**
     * @return mixed
     */
    public function getGuests()
    {
        return $this->guests;
    }

    /**
     * @param mixed $guests
     */
    public function setGuests($guests)
    {
        $this->guests = $guests;
    }

    /**
     * @return mixed
     */
    public function getRoomType()
    {
        return $this->roomType;
    }

    /**
     * @param mixed $roomType
     */
    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;
    }

    /**
     * @return mixed
     */
    public function getMealType()
    {
        return $this->mealType;
    }

    /**
     * @param mixed $mealType
     */
    public function setMealType($mealType)
    {
        $this->mealType = $mealType;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getTotalSellingPrice()
    {
        return $this->TotalSellingPrice;
    }

    /**
     * @param mixed $TotalSellingPrice
     */
    public function setTotalSellingPrice($TotalSellingPrice)
    {
        $this->TotalSellingPrice = $TotalSellingPrice;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->Messages;
    }

    /**
     * @param mixed $Messages
     */
    public function setMessages($Messages)
    {
        $this->Messages = $Messages;
    }



}