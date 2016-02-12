<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 2/12/16
 * Time: 9:57 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class VoucherInfo
 * @package SalmaAbdelhady\RoomsXML\Model
 * @XmlRoot("VoucherInfo")
 */
class VoucherInfo
{
    /**
     * @var
     * @SerializedName("PayableBy")
     * @Type(name="string")
     */
    protected $PayableBy;
    /**
     * @var
     * @SerializedName("VoucherRef")
     * @Type(name="string")
     */
    protected $VoucherRef;

    /**
     * @return mixed
     */
    public function getPayableBy()
    {
        return $this->PayableBy;
    }

    /**
     * @param mixed $PayableBy
     */
    public function setPayableBy($PayableBy)
    {
        $this->PayableBy = $PayableBy;
    }

    /**
     * @return mixed
     */
    public function getVoucherRef()
    {
        return $this->VoucherRef;
    }

    /**
     * @param mixed $VoucherRef
     */
    public function setVoucherRef($VoucherRef)
    {
        $this->VoucherRef = $VoucherRef;
    }


}