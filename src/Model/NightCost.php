<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 2/12/16
 * Time: 8:59 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class NightCost
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("NightCost")
 */
class NightCost
{
    /**
     * @var
     * @SerializedName("Night")
     * @Type(name="integer")
     */
    protected $night;
    /**
     * @var
     * @SerializedName("SellingPrice")
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\SellingPrice")
     *
     */
    protected $SellingPrice;

    /**
     * @return mixed
     */
    public function getNight()
    {
        return $this->night;
    }

    /**
     * @param mixed $night
     */
    public function setNight($night)
    {
        $this->night = $night;
    }

    /**
     * @return mixed
     */
    public function getSellingPrice()
    {
        return $this->SellingPrice;
    }

    /**
     * @param mixed $SellingPrice
     */
    public function setSellingPrice($SellingPrice)
    {
        $this->SellingPrice = $SellingPrice;
    }


}