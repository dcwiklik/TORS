<?php
namespace Booking\Core\Contact;

use Booking\Util\Collection;

class Contact extends AbstractContact
{
    /**
     *
     */
    public function __construct()
    {
        $this->fields = new Collection();
    }

    /**
     * @param $field
     * @return bool|mixed
     */
    public function get($field)
    {
        return $this->fields->getByKey($field);
    }

    /**
     * @param $value
     * @param $field
     * @param null $subkey
     */
    public function set($value, $field, $subkey = null)
    {
        $this->fields->add($value, $field);
    }
}