<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/30/16
 * Time: 9:41 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Hotel
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("Hotel")
 */
class Hotel
{
    /**
     * @var
     * @XmlAttribute()
     * @SerializedName("id")
     * @Type(name="integer")
     */
    private $id;

    /**
     * @var
     * @Type(name="string")
     * @SerializedName("name")
     * @XmlAttribute()
     */
    private $Name;


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
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }


}