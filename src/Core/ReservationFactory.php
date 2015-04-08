<?php
namespace Booking\Core;

class ReservationFactory extends AbstractReservationFactory
{
    /**
     * @return Reservation
     */
    public function createReservation()
    {
        return new Reservation();
    }
}