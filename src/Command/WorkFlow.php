<?php

namespace SalmaAbdelhady\RoomsXML\Command;

use SalmaAbdelhady\RoomsXML\Helper\AvailabilityHelper;
use SalmaAbdelhady\RoomsXML\Helper\RoomHelper;
use SalmaAbdelhady\RoomsXML\Request\AvailabilityRequest;
use SalmaAbdelhady\RoomsXML\Service\APIService;
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
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     * @throws \SalmaAbdelhady\RoomsXML\Exception\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<comment>Starting Workflow......</comment>');
        $output->writeln('<comment>Searching for availability, Hotel: Stigenberger Nile palace......</comment>');


        $service = new APIService();

        $date = new \DateTime('+2 days');

        $roomsInfo = [
            0 => [
                'AdultsCount' => 1,
            ],
            1 => ['AdultsCount' => 2,
                  'kidsCount'   => 2,
                  'kidsAges'    => [8, 10],
            ],
        ];

        $searchDetails = [
            'HotelStayDetails'   => [
                'ArrivalDate' => $date->format('Y-m-d'),
                'Nationality' => 'EG',
                'Nights'      => 3,
                'Room'        => RoomHelper::prepareRoomsForAvailability($roomsInfo),

            ],
            //                                            'HotelId'            => '86976',
            'RegionId'           => '16299',
            'MaxResultsPerHotel' => 1,
            'MaxHotels'          => 2,
            'CustomDetailLevel'  => AvailabilityRequest::DETAILS_LEVEL_FULL,
        ];

        $data = $service->search($searchDetails);

        $this->info($searchDetails, $output);
        $output->writeln('<comment>Results......</comment>');
//        $hotels  = AvailabilityHelper::getHotelsData($data);
        $results = AvailabilityHelper::transformHotelsResults($data);
        $this->info($results, $output);
    }


    private function info($message, OutputInterface $output)
    {
        if (\is_array($message)) {
            $message = json_encode($message, JSON_PRETTY_PRINT, JSON_UNESCAPED_SLASHES);
        }

        $output->write('<info>' . $message . '</info>', true);
    }

}