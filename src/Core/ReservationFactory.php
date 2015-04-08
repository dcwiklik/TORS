<?php
namespace Booking\Core;

class ReservationFactory extends ReservationFactoryAbstract
{
    public function createReservation()
    {
        return new Reservation();
    }
}