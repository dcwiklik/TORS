<?php
namespace Booking\Core\Factory;

use Booking\Core\Place\AbstractPlace;
use Booking\Util\Collection;

abstract class AbstractPlaceFactory extends AbstractFactory
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
     * @param AbstractPlace $place
     * @return mixed
     */
    abstract protected function prepare(AbstractPlace $place);
}
