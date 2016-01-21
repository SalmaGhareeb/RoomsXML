<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 7/30/15
 * Time: 3:18 PM
 */

namespace SalmaAbdelhady\RoomsXML;


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class RoomsXMLAuthentication
 * @package SalmaAbdelhady\RoomsXML
 * @XmlRoot(name="Authority")
 */
class RoomsXMLAuthentication extends RoomsXMLResponse
{

    /**
     * @var
     * @Type(name="string")
     * @SerializedName(name="Org")
     */
    private $Org;

    /**
     * @var
     * @Type(name="string")
     * @SerializedName(name="User")
     */
    private $userName;

    /**
     * @var
     * @SerializedName(name="Password")
     * @Type(name="string")
     */
    private $password;

    /**
     * @var
     * @Type(name="string")
     * @SerializedName(name="Language")
     */
    private $language;
    /**
     * @var
     * @Type(name="string")
     * @SerializedName(name="Currency")
     */
    private $currency;
    /**
     * @var
     * @Type(name="string")
     * @SerializedName(name="DebugMode")
     */
    private $debugMode;
    /**
     * @var
     * @Type(name="string")
     * @SerializedName(name="TestMode")
     */
    private $testMode;
    /**
     * @var
     * @Type(name="string")
     * @SerializedName(name="Timeout")
     */
    private $timeOut;
    /**
     * @var
     * @Type(name="string")
     * @SerializedName(name="Version")
     */
    private $version;

    /**
     * @return mixed
     */
    public function getOrg()
    {
        return $this->Org;
    }

    /**
     * @param mixed $Org
     */
    public function setOrg($Org)
    {
        $this->Org = $Org;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
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
    public function getDebugMode()
    {
        return $this->debugMode;
    }

    /**
     * @param mixed $debugMode
     */
    public function setDebugMode($debugMode)
    {
        $this->debugMode = $debugMode;
    }

    /**
     * @return mixed
     */
    public function getTestMode()
    {
        return $this->testMode;
    }

    /**
     * @param mixed $testMode
     */
    public function setTestMode($testMode)
    {
        $this->testMode = $testMode;
    }

    /**
     * @return mixed
     */
    public function getTimeOut()
    {
        return $this->timeOut;
    }

    /**
     * @param mixed $timeOut
     */
    public function setTimeOut($timeOut)
    {
        $this->timeOut = $timeOut;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}