<?php

namespace SalmaAbdelhady\RoomsXML;

use JMS\Serializer\Annotation as JMS;

/**
 * Class RoomsXMLAuthentication
 * @package SalmaAbdelhady\RoomsXML
 * @JMS\XmlRoot(name="Authority")
 */
class RoomsXMLAuthentication
{

    /**
     * @var
     * @JMS\Type(name="string")
     * @JMS\SerializedName("Org")
     * @JMS\XmlElement(cdata=false)
     */
    private $Org;

    /**
     * @var
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type(name="string")
     * @JMS\SerializedName("User")
     */
    private $userName;

    /**
     * @var
     * @JMS\XmlElement(cdata=false)
     * @JMS\SerializedName("Password")
     * @JMS\Type(name="string")
     */
    private $password;

    /**
     * @var
     * @JMS\Type(name="string")
     * @JMS\SerializedName("Language")
     * @JMS\XmlElement(cdata=false)
     */
    private $language;
    /**
     * @var
     * @JMS\Type(name="string")
     * @JMS\SerializedName("Currency")
     * @JMS\XmlElement(cdata=false)
     */
    private $currency;
    /**
     * @var
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type(name="string")
     * @JMS\SerializedName("DebugMode")
     */
    private $debugMode;
    /**
     * @var
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type(name="string")
     * @JMS\SerializedName("TestMode")
     */
    private $testMode;
    /**
     * @var
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type(name="string")
     * @JMS\SerializedName("Timeout")
     */
    private $timeOut;
    /**
     * @var
     * @JMS\XmlElement(cdata=false)
     * @JMS\Type(name="string")
     * @JMS\SerializedName("Version")
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