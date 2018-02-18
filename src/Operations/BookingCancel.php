<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 4/10/16
 * Time: 6:45 PM
 */

namespace SalmaAbdelhady\RoomsXML\Operations;


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlRoot;
use SalmaAbdelhady\RoomsXML\RoomsXMLRequest;

/**
 * Class BookingCreate
 *
 * @package SalmaAbdelhady\RoomsXML\Operations
 * @XmlRoot("BookingCancel")
 */
class BookingCancel extends RoomsXMLRequest
{
    /**
     * @var
     * @SerializedName("BookingId")
     * @Type(name="string")
     * @XmlElement(cdata=false)
     */
    private $BookingId;


    /**
     * @var
     * @Type(name="string")
     * @SerializedName("CommitLevel")
     * @XmlElement(cdata=false)
     */
    private $CommitLevel;

    /**
     * @param array $payLoad
     *
     * @return array
     * @throws \SalmaAbdelhady\RoomsXML\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function cancelBooking(array $payLoad): array
    {
        $this->setCommitLevel($payLoad['commitLevel']);
        $this->setBookingId($payLoad['bookingId']);
        $this->setAuthority($this->auth);
        $this->operationData = $this;

        $content = $this->sendRequest();

        return $this->getResponse($content, 'SalmaAbdelhady\RoomsXML\Results\BookingCancelResult');
    }

    /**
     * @return mixed
     */
    public function getBookingId()
    {
        return $this->BookingId;
    }

    /**
     * @param mixed $BookingId
     */
    public function setBookingId($BookingId)
    {
        $this->BookingId = $BookingId;
    }

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
}
