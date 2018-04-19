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

    private $service;

    public function __construct(string $name = null)
    {
        parent::__construct($name);
        $this->service = new APIService();
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
        $output->writeln('<comment>Searching for availability.....</comment>');
        $output->writeln('<comment>Results......</comment>');
        $data    = $this->search($output);
        $hotels  = AvailabilityHelper::getHotelsData($data);
        $results = AvailabilityHelper::transformHotelsResults($data);
        $hotel   = array_random($hotels);
        $room    = array_random($results[$hotel['id']]);

        $output->writeln('<comment>Start booking for hotel: ' . $hotel['name'] . '....</comment>');
        $output->writeln('<comment>And room details</comment>');
        $this->info($room, $output);

//        $bookingResult = $this->book($room);
//        dd($bookingResult);
    }

    /**
     * @param array $room
     * @param       $output
     *
     * @return array
     * @throws \SalmaAbdelhady\RoomsXML\Exception\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    private function book(array $room): array
    {
        $hotelStay = $this->getHotelStayDetails();
        unset($hotelStay['ArrivalDate'], $hotelStay['Nights']);

        $guests = [
            0 => [
                [
                    'type'  => 'Adult',
                    'title' => 'Mr',
                    'first' => 'first-x',
                    'last'  => 'last-x',
                ],
            ],
            1 => [
                [
                    'type'  => 'Adult',
                    'title' => 'Mr',
                    'first' => 'first-x5',
                    'last'  => 'last-x5',
                ],
                [
                    'type'  => 'Child',
                    'title' => 'Mr',
                    'age'   => '8',
                    'first' => 'first-x1',
                    'last'  => 'last-x',
                ],
                [
                    'type'  => 'Child',
                    'title' => 'Mr',
                    'age'   => '10',
                    'first' => 'first-x2',
                    'last'  => 'last-x',
                ],

            ],
        ];

        $hotelStay['Room'] = RoomHelper::prepareRoomsForBooking($guests);

        $bookDetails = [
            'QuoteId'          => $room['quoteId'],
            'HotelStayDetails' => $hotelStay,
            'CommitLevel'      => 'prepare',
        ];

        return $this->service->book($bookDetails);
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return mixed
     * @throws \SalmaAbdelhady\RoomsXML\Exception\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    private function search(OutputInterface $output)
    {
        $searchDetails = [
            'HotelStayDetails'   => $this->getHotelStayDetails(),
            'HotelId'            => '86976',
//            'RegionId'           => '16299',
            'MaxResultsPerHotel' => 1,
            'MaxHotels'          => 2,
            'CustomDetailLevel'  => AvailabilityRequest::DETAILS_LEVEL_FULL,
        ];
        $this->info($searchDetails, $output);

        return $this->service->search($searchDetails);
    }

    /**
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    private function getHotelStayDetails(): array
    {
        $date      = new \DateTime('+2 days');
        $roomsInfo = [
            0 => [
                'AdultsCount' => 1,
            ],
            1 => ['AdultsCount' => 1,
                  'kidsCount'   => 2,
                  'kidsAges'    => [8, 10],
            ],
        ];

        return [
            'ArrivalDate' => $date->format('Y-m-d'),
            'Nationality' => 'EG',
            'Nights'      => 3,
            'Room'        => RoomHelper::prepareRoomsForAvailability($roomsInfo),

        ];
    }

    /**
     * @param                                                   $message
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    private function info($message, OutputInterface $output): void
    {
        if (\is_array($message)) {
            $message = json_encode($message, JSON_PRETTY_PRINT, JSON_UNESCAPED_SLASHES);
        }

        $output->write('<info>' . $message . '</info>', true);
    }
}