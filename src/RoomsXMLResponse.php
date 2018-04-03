<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 7/28/15
 * Time: 1:29 PM
 */

namespace SalmaAbdelhady\RoomsXML;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;


/**
 * Class RoomsXMLResponse
 *
 * @package SalmaAbdelhady\RoomsXML
 */
class RoomsXMLResponse
{
    /**
     * @var
     * @SerializedName("Currency")
     * @Type(name="string")
     */
    protected $currency;

    /**
     * @var
     * @SerializedName("TestMode")
     * @Type(name="string")
     */
    protected $TestMode;

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getTestMode()
    {
        return $this->TestMode;
    }

    /**
     * @param mixed $TestMode
     */
    public function setTestMode($TestMode)
    {
        $this->TestMode = $TestMode;
    }
}