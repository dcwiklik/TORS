<?php
namespace Booking\Core;

use Booking\Util\Collection;

abstract class PlaceFactoryAbstract
{
    /**
     * @param $name
     * @param array $openHours
     * @return Restaurant
     */
    abstract function createRestaurant($name, array $openHours);

    /**
     * @param $name
     * @param array $openHours
     * @return Hotel
     */
    abstract function createHotel($name, array $openHours);
}
