<?php
namespace Booking\Core;

use Booking\Util\Collection;

abstract class PlaceAbstract
{
    /**
     * Place name
     * @var
     */
    protected $name;

    /**
     * Place open hours
     * @var Collection
     */
    protected $hours;

    /**
     * Place contacts
     * @var Collection
     */
    protected $contacts;

    /**
     * Place reservations
     * @var Collection
     */
    protected $reservations;

    /**
     * Create
     */
    abstract public function __construct();

    /**
     * Set hours for each week day
     * @param array $hours
     * @return mixed
     */
    abstract public function setHours(array $hours);
}