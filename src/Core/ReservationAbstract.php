<?php
namespace Booking\Core;

abstract class ReservationAbstract
{
    protected $datetimeFrom;
    protected $datetimeTo;

    abstract public function setDatetimeFrom(\DateTime $date);
    abstract public function getDatetimeFrom();

    abstract public function setDatetimeTo(\DateTime $date);
    abstract public function getDatetimeTo();
}