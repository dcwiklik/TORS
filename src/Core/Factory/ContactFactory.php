<?php
namespace Booking\Core\Factory;

use Booking\Core\Contact\Contact;

class ContactFactory extends AbstractFactory
{
    /**
     * @return Contact
     */
    public function createContact()
    {
        return new Contact();
    }
}