<?php
namespace Booking\Core;

use Booking\Util\Collection;

class PlaceFactory extends AbstractPlaceFactory
{
    /**
     * @return Restaurant
     */
    public function createRestaurant($name, array $openHours)
    {
        $r = new Restaurant();
        $this->prepare($r);

        $r->setName($name);
        $r->setHours($openHours);

        return $r;
    }

    /**
     * @return Hotel
     */
    public function createHotel($name, array $openHours)
    {
        $h = new Hotel();
        $this->prepare($h);

        $h->setName($name);
        $h->setHours($openHours);

        return $h;
    }

    /**
     * @param PlaceAbstract $place
     * @return void
     */
    protected function prepare(PlaceAbstract $place)
    {
        //add hours array
        $hours = array();

        for ($i=1; $i<=7; $i++) {
            $hours[$i] = array();
        }

        $place->setHours($hours);
    }
}
