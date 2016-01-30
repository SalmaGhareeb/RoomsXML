<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/30/16
 * Time: 9:46 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Result
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("Result")
 */
class Result
{
    /**
     * @var
     * @XmlAttribute()
     * @SerializedName("id")
     * @Type("string")
     */
    private $id;

    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\Room")
     * @SerializedName("Room")
     */
    private $room;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }


}