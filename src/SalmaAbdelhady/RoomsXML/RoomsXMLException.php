<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 7/28/15
 * Time: 10:28 AM
 */

namespace SalmaAbdelhady\RoomsXML;


use SalmaAbdelhady\RoomsXML\RoomsXMLResponse;

/**
 * Class RoomsXMLException
 * @package SalmaAbdelhady\RoomsXML
 */
class RoomsXMLException extends \Exception
{

    public function __construct($message = null, $code = null)
    {
        parent::__construct($message, $code);
    }
}