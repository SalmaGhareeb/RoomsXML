<?php

namespace SalmaAbdelhady\RoomsXML\Helper;


class RoomHelper
{

    /**
     * @param array $roomsInfo
     *                              Room Info example
     *                              [
     *                              0 => [
     *                              'AdultsCount' => 1,
     *                              ],
     *                              1 => [
     *                              'AdultsCount' => 2,
     *                              'kidsCount' => 2,
     *                              'kidsAges' => [8,10]
     *                              ]
     *                              [
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public static function prepareRoomsForAvailability(array $roomsInfo): array
    {
        $rooms = [];
        foreach ($roomsInfo as $roomInfo) {
            $adults = self::adultsForSearch($roomInfo['AdultsCount'] ?? '');
            $kids   = self::kidsForSearch($roomInfo['kidsCount'] ?? 0, $roomInfo['kidsAges'] ?? []);


            $rooms[] = [
                'Guests' => array_merge($adults, $kids),
            ];
        }

        return $rooms;
    }

    /**
     * @param array $guests
     *                                      Room Info example
     *                                      [
     *                                      0 => [
     *                                      [
     *                                      'type' => 'Adult'
     *                                      'title' => 'Mr/Ms/Mrs'
     *                                      ],
     *                                      ],
     *                                      1 => [
     *                                      [
     *                                      'type' => 'Adult'
     *                                      'title' => 'Mr/Ms/Mrs'
     *                                      ],
     *                                      [
     *                                      'type' => 'Child'
     *                                      'title' => 'Mr/Ms/Mrs'
     *                                      'age' => '1'
     *                                      ],
     *                                      ]
     *                                      [
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public static function prepareRoomsForBooking(array $guests): array
    {
        $result = [];

        foreach ($guests as $guestsInfo) {
            $arr = [];
            foreach ($guestsInfo as $guest) {
                $type = $guest['type'];

                $arr[$type][] = ['_attributes' =>
                                     [
                                         'title' => $guest['title'],
                                         'age'   => $guest['age'] ?? '',
                                         'first' => $guest['first'],
                                         'last'  => $guest['last'],
                                     ],
                ];

            }
            $result[] = [
                'Guests' => $arr,
            ];

        }

        return $result;
    }

    /**
     * @param int $count
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    private static function adultsForSearch(int $count): array
    {
        $arr = [];
        for ($i = 0; $i < $count; $i++) {
            $arr[] = ['_attributes' => []];
        }

        return ['Adult' => $arr];
    }

    /**
     * @param int   $count
     * @param array $kidsAges
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    private static function kidsForSearch(int $count, array $kidsAges): array
    {
        $arr = [];
        for ($i = 0; $i < $count; $i++) {
            $arr[] = ['_attributes' =>
                          [
                              'age' => $kidsAges[$i],
                          ]];
        }

        return $count ? ['Child' => $arr] : [];
    }
}