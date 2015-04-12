<?php
namespace Booking\Core\Factory;

use Booking\Core\Booking\Reservation;

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