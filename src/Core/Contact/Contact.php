<?php
namespace Booking\Core\Contact;

use Booking\Util\Collection;

class Contact extends AbstractContact
{
    public function __construct()
    {
        $this->fields = new Collection();
    }

    public function get($field)
    {
        return $this->fields->getByKey($field);
    }

    public function set($value, $field, $subkey = null)
    {
        $this->fields->add($value, $field);
    }
}