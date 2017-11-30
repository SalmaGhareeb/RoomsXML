<?php
/**
 * Created by PhpStorm.
 * User: salmah
 * Date: 1/21/16
 * Time: 11:10 PM
 */

namespace SalmaAbdelhady\RoomsXML\Model;


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

/**
 * Class Person
 * @package SalmaAbdelhady\RoomsXML\Model
 */
class Person
{
    /**
     * @var
     * @Type(name="integer")
     * @XmlAttribute()
     */
    private $id;

    /**
     * @var
     * @Type(name="string")
     * @XmlAttribute()
     */
    private $title;

    /**
     * @var
     * @Type(name="string")
     * @XmlAttribute()
     */
    private $first;
    /**
     * @var
     * @Type(name="string")
     * @XmlAttribute()
     */
    private $last;


    /**
     * @var
     * @Type(name="SalmaAbdelhady\RoomsXML\Model\Price")
     * @SerializedName("Price")
     */
    private $price;

    /**
     * @var
     * @XmlAttribute()
     * @Type(name="integer")
     */
    private $age;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * @param mixed $first
     */
    public function setFirst($first)
    {
        $this->first = $first;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * @param mixed $last
     */
    public function setLast($last)
    {
        $this->last = $last;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }


}