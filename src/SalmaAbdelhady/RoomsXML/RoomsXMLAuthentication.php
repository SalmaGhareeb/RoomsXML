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
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class RoomsXMLAuthentication
 * @package SalmaAbdelhady\RoomsXML
 * @XmlRoot(name="Authority")
 */
class RoomsXMLAuthentication
{

    /**
     * @var
     * @Type(name="string")
     * @SerializedName("Org")
     * @XmlElement(cdata=false)
     */
    private $Org;

    /**
     * @var
     * @XmlElement(cdata=false)
     * @Type(name="string")
     * @SerializedName("User")
     */
    private $userName;

    /**
     * @var
     * @XmlElement(cdata=false)
     * @SerializedName("Password")
     * @Type(name="string")
     */
    private $password;

    /**
     * @var
     * @Type(name="string")
     * @SerializedName("Language")
     * @XmlElement(cdata=false)
     */
    private $language;
    /**
     * @var
     * @Type(name="string")
     * @SerializedName("Currency")
     * @XmlElement(cdata=false)
     */
    private $currency;
    /**
     * @var
     * @XmlElement(cdata=false)
     * @Type(name="string")
     * @SerializedName("DebugMode")
     */
    private $debugMode;
    /**
     * @var
     * @XmlElement(cdata=false)
     * @Type(name="string")
     * @SerializedName("TestMode")
     */
    private $testMode;
    /**
     * @var
     * @XmlElement(cdata=false)
     * @Type(name="string")
     * @SerializedName("Timeout")
     */
    private $timeOut;
    /**
     * @var
     * @XmlElement(cdata=false)
     * @Type(name="string")
     * @SerializedName("Version")
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