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
     * @Type(name="SalmaAbdelhady/RoomsXML/Model/Guests")
     * @SerializedName(name="Guests")
     */
    private $guests;

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



}