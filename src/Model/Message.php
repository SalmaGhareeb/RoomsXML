<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 2/9/16
 * Time: 6:40 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Message
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("Message")
 */
class Message
{

    /**
     * @var
     * @SerializedName("Type")
     * @Type(name="string")
     */
    protected $type;
    /**
     * @var
     * @SerializedName("Text")
     * @Type(name="string")
     */
    protected $text;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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