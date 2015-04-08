<?php
namespace Booking\Core;

abstract class AbstractBooking
{
    abstract public function checkAvailable(AbstractPlace $place, \DateTime $datetimeFrom, \DateTime $datetimeTo);
    abstract public function createReservation(AbstractPlace $place, \DateTime $datetimeFrom, \DateTime $datetimeTo);
}
