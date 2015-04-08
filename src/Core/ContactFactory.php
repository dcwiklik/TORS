<?php
namespace Booking\Core;

class ContactFactory
{
    /**
     * @return Contact
     */
    public function createContact()
    {
        return new Contact();
    }
}