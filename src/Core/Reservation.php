<?php
namespace Booking\Core;

class Reservation
{
    private $dateFrom;

    public function setDate($date)
    {
        $this->dateFrom = $date;
    }

    public function getDate()
    {
        return $this->dateFrom;
    }

    /**
     * @param $place PlaceInterface
     * @param $datetime
     * @param $persons
     * @throws InvalidArgumentException
     */
    public function add(PlaceInterface $place, $datetime, $persons)
    {
        if($place instanceof Restaurant) {

        }
        if($place instanceof Hotel) {

        }

        throw new InvalidArgumentException("Unknown place type");
    }
}