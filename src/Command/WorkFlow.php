<?php

namespace SalmaAbdelhady\RoomsXML\Command;

use SalmaAbdelhady\RoomsXML\Model\HotelStayDetails;
use SalmaAbdelhady\RoomsXML\Operations\AvailabilitySearch;
use SalmaAbdelhady\RoomsXML\RoomsXMLAuthentication;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WorkFlow extends Command
{

    protected static $defaultName = 'work-flow';

    private $auth;

    public function __construct(string $name = null)
    {
        parent::__construct($name);
        $this->auth = new RoomsXMLAuthentication();
        $this->auth->setOrg('fllc'); //Agency ID
        $this->auth->setUserName('xmltest'); //Username
        $this->auth->setPassword('xmltest'); //Password
        $this->auth->setVersion('1.26');
        $this->auth->setCurrency('USD');
        $this->auth->setLanguage('en');//optional
        $this->auth->setDebugMode(true);//optional
        $this->auth->setTestMode(true);//optional
    }

    /**
     * @inheritdoc
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    protected function configure()
    {
        $this->setDescription('Workflow start by availability search to booking creation/cancellation');
    }

    /**
     * @inheritdoc
     *
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Starting Workflow......</info>');
        $output->writeln('<info>Searching for availability, Hotel: Stigenberger Nile palace......</info>');
        $results = $this->testAvailabilitySearch();
        /** @var \SalmaAbdelhady\RoomsXML\Model\HotelAvailability $hotelAvailability */
        $hotelAvailability = $results->getHotelAvailability();
        $hotelAvailability = reset($hotelAvailability);
        $roomsResults      = $hotelAvailability->getResults();
        $countResults      = count($roomsResults);
        $output->writeln("<info>{$countResults} Room result returned</info>");
    }

    /**
     * @return array|\SalmaAbdelhady\RoomsXML\Results\AvailabilitySearchResult
     * @throws \SalmaAbdelhady\RoomsXML\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    private function testAvailabilitySearch()
    {
        $hotelStayDetails = new HotelStayDetails();
        $hotelStayDetails->setArrivalDate(new \DateTime('+2 weeks'));
        $hotelStayDetails->setNationality('EG');
        $hotelStayDetails->setNights(4);
        $hotelStayDetails->setRoomsDetails([['adult' => 2, 'child' => 0]]);

        $availability = new AvailabilitySearch($this->auth);
//        $availability->setRegionId(16294);//or
        $availability->setHotelId(86967);
        $availability->setHotelStayDetails($hotelStayDetails);


        return $availability->checkAvailability();
    }
}