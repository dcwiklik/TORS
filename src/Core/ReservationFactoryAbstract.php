<?php
namespace Booking\Core;

abstract class ReservationFactoryAbstract
{
    /**
     * @return Reservation
     */
    abstract public function createReservation();
}