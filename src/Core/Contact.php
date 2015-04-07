<?php
namespace Booking\Core;

class Contact
{
    private $address;
    private $phone;

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}