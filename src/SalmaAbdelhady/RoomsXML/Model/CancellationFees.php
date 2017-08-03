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
use JMS\Serializer\Annotation\XmlList;
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
     * @Type(name="array<SalmaAbdelhady\RoomsXML\Model\Fee>")
     * @XmlList(inline=true, entry="Fee")
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