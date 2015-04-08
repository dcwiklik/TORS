<?php
namespace Booking\Core;

abstract class AbstractContact
{
    protected $address;
    protected $phone;

    abstract public function setAddress($address);
    abstract public function getAddress();

    abstract public function setPhone($phone);
    abstract public function getPhone();
}