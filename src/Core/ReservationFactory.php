<?php
namespace Booking\Core;

class ReservationFactory
{
    public static function createReservation()
    {
        return new Reservation();
    }
}