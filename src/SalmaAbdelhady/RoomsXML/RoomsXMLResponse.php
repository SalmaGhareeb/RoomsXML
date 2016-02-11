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
 * @package SalmaAbdelhady\RoomsXML
 */
class RoomsXMLResponse extends \ArrayObject
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
     * @return array
     */
    public function getArrayCopy()
    {
        $resultArray = parent::getArrayCopy();

        foreach ($resultArray as $key => $val) {
            if (!is_object($val)) {
                continue;
            }

            $object            = new RoomsXMLResponse($val);
            $resultArray[$key] = $object->getArrayCopy();
        }

        return $resultArray;
    }


    public function getResponse()
    {
        $this->getArrayCopy();

        return array_values($this->getArrayCopy());
    }



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
    public function setCurrency($currency)
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