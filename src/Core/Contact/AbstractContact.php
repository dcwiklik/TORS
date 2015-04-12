<?php
namespace Booking\Core\Contact;

use Booking\Util\Collection;

abstract class AbstractContact
{
    const
        FIELD_JOB_TITLE = 'JOB_TITLE',
        FIELD_NAME_FIRST = 'FIRST_NAME',
        FIELD_NAME_LAST = 'LAST_NAME',
        FIELD_NAME_CONTACT = 'CONTACT_NAME',

        FIELD_ADDRESS = 'ADDRESS',
        FIELD_ADDRESS_POSTCODE = 'ADDRESS_POSTCODE',
        FIELD_ADDRESS_CITY = 'ADDRESS_CITY',
        FIELD_ADDRESS_PROVINCE = 'ADDRESS_PROVINCE',

        FIELD_PHONE = 'PHONE',
        FIELD_PHONE_MOBILE = 'PHONE_MOBILE',
        FIELD_PHONE_WORK = 'PHONE_WORK',
        FIELD_PHONE_PRIVATE = 'PHONE_PRIVATE',
        FIELD_FAX = 'FAX',

        FIELD_EMAIL = 'EMAIL',
        FIELD_WEBSITE = 'WEBSITE';

    /**
     * @var Collection
     */
    protected $fields;

    abstract public function __construct();

    /**
     * Contact field
     * @param $key
     * @return mixed
     */
    abstract public function get($field);
    abstract public function set($value, $field, $subkey = null);
}