<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 2/12/16
 * Time: 9:43 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Fee
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("Fee")
 */
class Fee
{
    /**
     * @var
     * @Type(name="string")
     * @SerializedName("from")
     * @XmlAttribute()
     */
    private $from;


    /**
     * @var
     * @SerializedName("Amount")
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\Amount")
     */
    protected $amount;

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }



}