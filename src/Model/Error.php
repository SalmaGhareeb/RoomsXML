<?php

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class Error
 * @package SalmaAbdelhady\RoomsXML\Model
 * @JMS\XmlRoot("Error")
 */
class Error
{
    /**
     * @var
     * @SerializedName("Code")
     * @Type(name="integer")
     */
    private $code;
    /**
     * @var
     * @SerializedName("Description")
     * @Type(name="string")
     */
    private $Description;

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
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }
}