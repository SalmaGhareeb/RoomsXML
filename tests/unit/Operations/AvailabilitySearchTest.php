<?php

namespace SalmaAbdelhady\RoomsXML\Tests\unit\Operations;

use SalmaAbdelhady\RoomsXML\Model\HotelStayDetails;
use SalmaAbdelhady\RoomsXML\Operations\AvailabilitySearch;
use SalmaAbdelhady\RoomsXML\Results\AvailabilitySearchResult;
use SalmaAbdelhady\RoomsXML\Tests\unit\UnitTester;

class AvailabilitySearchTest extends UnitTester
{

    // tests
    public function testCheckAvailability()
    {
        $hotelStayDetails = new HotelStayDetails();
        $hotelStayDetails->setArrivalDate(new \DateTime('+2 weeks'));
        $hotelStayDetails->setNationality('EG');
        $hotelStayDetails->setNights(4);
        $hotelStayDetails->setRoomsDetails([['adult' => 2, 'child' => 0]]);

        $availability = new AvailabilitySearch($this->auth);
        $availability->setRegionId(16294);//or $availability->setHotelId(*id*);
        $availability->setHotelStayDetails($hotelStayDetails);


        $result = $availability->checkAvailability();

        $this->tester->assertInstanceOf( AvailabilitySearchResult::class, $result);
    }

    /**
     * @throws \SalmaAbdelhady\RoomsXML\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     * @expectedException \SalmaAbdelhady\RoomsXML\RoomsXMLException
     */
    public function testCheckAvailabilityWithWrongDates()
    {
        $hotelStayDetails = new HotelStayDetails();
        $hotelStayDetails->setArrivalDate(new \DateTime('-2 weeks'));
        $hotelStayDetails->setNationality('EG');
        $hotelStayDetails->setNights(4);
        $hotelStayDetails->setRoomsDetails([['adult' => 2, 'child' => 0]]);

        $availability = new AvailabilitySearch($this->auth);
        $availability->setRegionId(16294);//or $availability->setHotelId(*id*);
        $availability->setHotelStayDetails($hotelStayDetails);


        $result = $availability->checkAvailability();

        $this->tester->assertInstanceOf( AvailabilitySearchResult::class, $result);
    }
}