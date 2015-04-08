<?php
namespace Booking\Core;

use Booking\Util\Collection;

abstract class AbstractPlaceFactory
{
    /**
     * @param $name
     * @param array $openHours
     * @return Restaurant
     */
    abstract public function createRestaurant($name, array $openHours);

    /**
     * @param $name
     * @param array $openHours
     * @return Hotel
     */
    abstract public function createHotel($name, array $openHours);

    /**
     * @param PlaceAbstract $place
     * @return mixed
     */
    abstract protected function prepare(PlaceAbstract $place);
}
