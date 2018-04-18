<?php


namespace SalmaAbdelhady\RoomsXML\Helper;


class AvailabilityHelper
{
    /**
     * @param array $response
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public static function getHotelsData(array $response): array
    {
        $hotels = $response['HotelAvailability'] ?? [];

        return array_map(function ($hotel) {

            return [
                'id'   => $hotel['Hotel']['@attributes']['id'],
                'name' => $hotel['Hotel']['@attributes']['name'],
            ];
        }, $hotels);
    }

    /**
     * @param array $response
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public static function transformHotelsResults(array $response): array
    {
        $hotels      = $response['HotelAvailability'] ?? [];
        $transformed = [];
        foreach ($hotels as $hotel) {
            $results               = $hotel['Result'];
            $hotelId               = $hotel['Hotel']['@attributes']['id'];
            $transformed[$hotelId] = array_map(function ($result) {
                return [
                    'quoteId' => $result['@attributes']['id'],
                    'details' => self::transformRooms($result['Room']),
                ];
            }, $results);
        }

        return $transformed;
    }

    /**
     * @param array $rooms
     *
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public static function transformRooms(array $rooms): array
    {
        return array_map(function ($room) {
            return [
                'price'    => $room['Price']['@attributes']['amt'],
                'roomType' => $room['RoomType']['@attributes']['text'] ?? '',
                'meanType' => $room['MealType']['@attributes']['text'] ?? '',
            ];
        }, $rooms);
    }

    /**
     * @param array $response
     *
     * @return int
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public static function numberOfHotelsResults(array $response): int
    {
        return \count($response['HotelAvailability']['Hotel']) ?? 0;
    }
}