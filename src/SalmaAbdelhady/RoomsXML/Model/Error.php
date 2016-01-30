<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/30/16
 * Time: 11:22 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Error
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("Error")
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