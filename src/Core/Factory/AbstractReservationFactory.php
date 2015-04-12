<?php
namespace Booking\Core\Factory;

abstract class AbstractReservationFactory extends AbstractFactory
{
    /**
     * @return Reservation
     */
    abstract public function createReservation();
}