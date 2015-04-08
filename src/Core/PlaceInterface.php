<?php
namespace Booking\Core;

use Booking\Util\Collection;

abstract class PlaceInterface
{
    /**
     * Name
     * @var
     */
    protected $name;

    /**
     * Open hours
     * @var Collection
     */
    protected $hours;

    /**
     * Contacts
     * @var Collection
     */
    protected $contacts;

    /**
     * Reservations
     * @var Collection
     */
    protected $reservations;

    /**
     *
     */
    public abstract function __construct();

}