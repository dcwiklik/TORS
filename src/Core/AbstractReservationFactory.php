<?php
namespace Booking\Core;

abstract class AbstractReservationFactory
{
    /**
     * @return Reservation
     */
    abstract public function createReservation();
}