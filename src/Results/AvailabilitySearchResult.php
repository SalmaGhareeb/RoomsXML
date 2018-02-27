<?php


namespace SalmaAbdelhady\RoomsXML\Results;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;
use SalmaAbdelhady\RoomsXML\RoomsXMLResponse;

/**
 * Class AvailabilitySearchResult
 * @XmlRoot(name="AvailabilitySearchResult")
 */
class AvailabilitySearchResult extends RoomsXMLResponse
{

    /**
     * @XmlList(inline=true,entry="HotelAvailability")
     * @XmlElement(cdata=false)
     * @Type(name="array<SalmaAbdelhady\RoomsXML\Model\HotelAvailability>")
     * @SerializedName("HotelAvailability")
     */
    protected $hotelAvailability;


    /**
     * @return array
     */
    public function getHotelAvailability(): array
    {
        return $this->hotelAvailability;
    }

    /**
     * @param mixed $hotelAvailability
     */
    public function setHotelAvailability($hotelAvailability): void
    {
        $this->hotelAvailability = $hotelAvailability;
    }
}