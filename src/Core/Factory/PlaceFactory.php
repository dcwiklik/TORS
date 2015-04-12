<?php
namespace Booking\Core\Factory;

use Booking\Core\Place\AbstractPlace;
use Booking\Core\Place\Cinema;
use Booking\Core\Place\Hotel;
use Booking\Core\Place\Restaurant;
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
     * @return Hotel
     */
    public function createCinema($name, array $openHours)
    {
        $h = new Cinema();
        $this->prepare($h);

        $h->setName($name);
        $h->setHours($openHours);

        return $h;
    }

    /**
     * @param AbstractPlace $place
     * @return void
     */
    protected function prepare(AbstractPlace $place)
    {
        //add hours array
        $hours = array();

        for ($i=1; $i<=7; $i++) {
            $hours[$i] = array();
        }

        $place->setHours($hours);
    }
}
