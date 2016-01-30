<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/30/16
 * Time: 10:00 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class RoomData
{

    /**
     * @var
     * @Type(name="integer")
     * @SerializedName("code")
     * @XmlAttribute()
     */
    private $code;

    /**
     * @var
     * @Type(name="string")
     * @SerializedName("text")
     * @XmlAttribute()
     */
    private $text;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

}