<?php
namespace Booking\Core;

class ReservationFactory extends ReservationFactoryAbstract
{
    /**
     * @return Reservation
     */
    public function createReservation()
    {
        return new Reservation();
    }
}