<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 2/12/16
 * Time: 9:42 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class CancellationFees
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("CanxFees")
 */
class CancellationFees
{

    /**
     * @var
     * @SerializedName("Fee")
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\Fee")
     */
    protected $fee;



    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param mixed $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }



}