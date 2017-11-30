<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 2/9/16
 * Time: 6:46 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class HotelBooking
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("HotelBooking")
 */
class HotelBooking
{
    /**
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\Room")
     * @SerializedName("Room")
     */
    protected $Room;


    /**
     * @var
     * @SerializedName("HotelId")
     * @Type(name="integer")
     */
    private $hotelId;
    /**
     * @var
     * @SerializedName("Id")
     * @Type(name="integer")
     */
    private $Id;

    /**
     * @var
     * @SerializedName("HotelName")
     * @Type(name="string")
     */
    private $hotelName;


    /**
     * @var
     * @Type(name="DateTime<'Y-m-d'>")
     * @SerializedName("CreationDate")
     */
    protected $CreationDate;

    /**
     * @var
     * @Type(name="DateTime<'Y-m-d'>")
     * @SerializedName("ArrivalDate")
     */
    protected $ArrivalDate;


    /**
     * @var
     * @Type(name="string")
     * @SerializedName("Status")
     */
    protected $Status;

    /**
     * @var
     * @SerializedName("TotalSellingPrice")
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\TotalSellingPrice")
     */
    protected $TotalSellingPrice;

    /**
     * @var
     * @Type(name="integer")
     * @SerializedName("Nights")
     */
    protected $Nights;

    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\VoucherInfo")
     * @SerializedName("VoucherInfo")
     */
    protected $VoucherInfo;


    /**
     * @return mixed
     */
    public function getHotelId()
    {
        return $this->hotelId;
    }

    /**
     * @param mixed $hotelId
     */
    public function setHotelId($hotelId)
    {
        $this->hotelId = $hotelId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @return mixed
     */
    public function getHotelName()
    {
        return $this->hotelName;
    }

    /**
     * @param mixed $hotelName
     */
    public function setHotelName($hotelName)
    {
        $this->hotelName = $hotelName;
    }

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
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param mixed $Status
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
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
    public function getRoom()
    {
        return $this->Room;
    }

    /**
     * @param mixed $Room
     */
    public function setRoom($Room)
    {
        $this->Room = $Room;
    }

    /**
     * @return mixed
     */
    public function getVoucherInfo()
    {
        return $this->VoucherInfo;
    }

    /**
     * @param mixed $VoucherInfo
     */
    public function setVoucherInfo($VoucherInfo)
    {
        $this->VoucherInfo = $VoucherInfo;
    }
}