<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/30/16
 * Time: 10:40 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Price
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("Price")
 */
class Price
{
    /**
     * @var
     * @XmlAttribute()
     * @SerializedName("amt")
     * @Type(name="double")
     */
   private $amount;

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