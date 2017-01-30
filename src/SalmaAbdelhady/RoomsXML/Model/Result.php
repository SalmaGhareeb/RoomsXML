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
use JMS\Serializer\Annotation\XmlList;

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
     * @Type(name="array<SalmaAbdelhady\RoomsXML\Model\Room>")
     * @XmlList(inline = true, entry = "Room")
     * @SerializedName("Room")
     */
    private $rooms;

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
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param mixed $rooms
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }


}
