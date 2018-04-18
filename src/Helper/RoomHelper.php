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
            $adults = self::adults($roomInfo['AdultsCount'] ?? '');
            $kids   = self::kids($roomInfo['kidsCount'] ?? 0, $roomInfo['kidsAges'] ?? []);


            $rooms[] = [
                'Guests' => array_merge($adults, $kids),
            ];
        }

        return $rooms;
    }

    /**
     * @param int $count
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    private static function adults(int $count): array
    {
        $arr = [];
        for ($i = 0; $i < $count; $i++) {
            $arr[] = ['_attributes' =>
                          [
//                              'title' => '',
                          ]];
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
    private static function kids(int $count, array $kidsAges): array
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