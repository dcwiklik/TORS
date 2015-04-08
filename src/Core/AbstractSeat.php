<?php
namespace Booking\Core;

abstract class AbstractSeat
{
    abstract public function getId();
    abstract public function getName();
}