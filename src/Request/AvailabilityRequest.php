<?php

namespace SalmaAbdelhady\RoomsXML\Request;
/**
 * Class AvailabilityRequest
 *
 * @package SalmaAbdelhady\RoomsXML\Request
 */
class AvailabilityRequest extends AbstractRequest
{
    const DETAILS_LEVEL_FULL  = 'full';
    const DETAILS_LEVEL_BASIC = 'basic';


    public $rules = [
        'HotelStayDetails.ArrivalDate' => 'required|date|date_format:Y-m-d',
        'HotelStayDetails.Nights'      => 'required|integer',
        'HotelStayDetails.Nationality' => 'required|string',
        'HotelStayDetails.Room'        => 'required|array',
        'HotelSearchCriteria'          => 'nullable|array',
        'RegionId'                     => 'nullable|integer',
        'HotelId'                      => 'nullable|integer',
        'Hotels'                       => 'nullable|array',
        'CustomDetailLevel'            => 'nullable|string',
        'MaxResultsPerHotel'           => 'nullable|integer',
        'MaxHotels'                    => 'nullable|integer',
        'MaxSearchTime'                => 'nullable|integer',
    ];


    public $attributes = [
        'HotelStayDetails',
        'HotelSearchCriteria',
        'RegionId',
        'HotelId',
        'CustomDetailLevel',
        'DetailLevel',
        'MaxResultsPerHotel',
        'MaxHotels',
        'MaxSearchTime',
    ];


    public $hotelSearchCriteria;

    public $RegionId;

    public $HotelId;

    public $CustomDetailLevel = self::DETAILS_LEVEL_FULL;

    public $MaxResultsPerHotel;

    public $MaxHotels;

    public $MaxSearchTime = 30;

    /**
     * @return mixed
     */
    public function getHotelSearchCriteria()
    {
        return $this->hotelSearchCriteria;
    }

    /**
     * @param mixed $hotelSearchCriteria
     */
    public function setHotelSearchCriteria($hotelSearchCriteria)
    {
        $this->hotelSearchCriteria = $hotelSearchCriteria;
    }

    /**
     * @return mixed
     */
    public function getRegionId()
    {
        return $this->RegionId;
    }

    /**
     * @param mixed $RegionId
     */
    public function setRegionId($RegionId)
    {
        $this->RegionId = $RegionId;
    }

    /**
     * @return mixed
     */
    public function getHotelId()
    {
        return $this->HotelId;
    }

    /**
     * @param mixed $HotelId
     */
    public function setHotelId($HotelId)
    {
        $this->HotelId = $HotelId;
    }

    /**
     * @return mixed
     */
    public function getCustomDetailLevel()
    {
        return $this->CustomDetailLevel;
    }

    /**
     * @param mixed $CustomDetailLevel
     */
    public function setCustomDetailLevel($CustomDetailLevel)
    {
        $this->CustomDetailLevel = $CustomDetailLevel;
    }

    /**
     * @return mixed
     */
    public function getDetailLevel()
    {
        return $this->DetailLevel;
    }

    /**
     * @param mixed $DetailLevel
     */
    public function setDetailLevel($DetailLevel)
    {
        $this->DetailLevel = $DetailLevel;
    }

    /**
     * @return mixed
     */
    public function getMaxResultsPerHotel()
    {
        return $this->MaxResultsPerHotel;
    }

    /**
     * @param mixed $MaxResultsPerHotel
     */
    public function setMaxResultsPerHotel($MaxResultsPerHotel)
    {
        $this->MaxResultsPerHotel = $MaxResultsPerHotel;
    }

    /**
     * @return mixed
     */
    public function getMaxHotels()
    {
        return $this->MaxHotels;
    }

    /**
     * @param mixed $MaxHotels
     */
    public function setMaxHotels($MaxHotels)
    {
        $this->MaxHotels = $MaxHotels;
    }

    /**
     * @return int
     */
    public function getMaxSearchTime(): int
    {
        return $this->MaxSearchTime;
    }

    /**
     * @param int $MaxSearchTime
     */
    public function setMaxSearchTime($MaxSearchTime)
    {
        $this->MaxSearchTime = $MaxSearchTime;
    }
}