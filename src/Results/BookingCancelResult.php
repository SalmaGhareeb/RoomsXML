<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 4/10/16
 * Time: 6:48 PM
 */

namespace SalmaAbdelhady\RoomsXML\Results;


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class BookingCreateResult
 * @package SalmaAbdelhady\RoomsXML\Results
 * @XmlRoot("BookingCancelResult")
 */
class BookingCancelResult
{
    /**
     * @var
     * @SerializedName("CommitLevel")
     * @Type(name="string")
     */
    private $CommitLevel;

    /**
     * @var
     * @SerializedName("Booking")
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\Booking")
     */
    private $Booking;

    /**
     * @return mixed
     */
    public function getCommitLevel()
    {
        return $this->CommitLevel;
    }

    /**
     * @param mixed $CommitLevel
     */
    public function setCommitLevel($CommitLevel)
    {
        $this->CommitLevel = $CommitLevel;
    }

    /**
     * @return mixed
     */
    public function getBooking()
    {
        return $this->Booking;
    }

    /**
     * @param mixed $Booking
     */
    public function setBooking($Booking)
    {
        $this->Booking = $Booking;
    }


}