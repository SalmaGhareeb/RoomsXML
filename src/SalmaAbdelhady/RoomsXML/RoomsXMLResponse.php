<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 7/28/15
 * Time: 1:29 PM
 */

namespace SalmaAbdelhady\RoomsXML;


/**
 * Class RoomsXMLResponse
 * @package SalmaAbdelhady\RoomsXML
 */
class RoomsXMLResponse extends \ArrayObject
{
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
            $o                 = new RoomsXMLResponse($val);
            $resultArray[$key] = $o->getArrayCopy();
        }

        return $resultArray;
    }


    public function getResponse()
    {
        $this->getArrayCopy();

        return array_values($this->getArrayCopy());
    }
}