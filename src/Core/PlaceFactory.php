<?php
namespace Booking\Core;

use Booking\Util\Collection;

class PlaceFactory
{
    /**
     * @return Restaurant
     */
    public static function createRestaurant($name, array $openHours)
    {
        $r = new Restaurant();
        $r->setName($name);
        $r->setHours($openHours);

        return $r;
    }

    /**
     * @return Hotel
     */
    public static function createHotel($name, array $openHours)
    {
        $h = new Hotel();
        $h->setName($name);
        $h->setHours($openHours);

        return $h;
    }
}