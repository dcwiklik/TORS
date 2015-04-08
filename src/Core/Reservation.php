<?php
namespace Booking\Core;

class Reservation extends ReservationAbstract
{
    /**
     * Set reservation start date
     * @param \DateTime $date
     */
    public function setDatetimeFrom(\DateTime $date)
    {
        $this->datetimeFrom = $date;
    }

    /**
     * Get reservation start date
     * @return mixed
     */
    public function getDatetimeFrom()
    {
        return $this->datetimeFrom;
    }

    /**
     * Set reservation end date
     * @param \DateTime $date
     */
    public function setDatetimeTo(\DateTime $date)
    {
        $this->datetimeTo = $date;
    }

    /**
     * Get reservation end date
     * @return mixed
     */
    public function getDatetimeTo()
    {
        return $this->datetimeTo;
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