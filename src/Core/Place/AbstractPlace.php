<?php
namespace Booking\Core\Place;

use Booking\Util\Collection;

abstract class AbstractPlace
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
     * Place floors
     * @var Collection
     */
    protected $floors;

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
     * @return mixed
     */
    abstract public function getType();

    /**
     * Set hours for each week day
     * @param array $hours
     * @return mixed
     */
    abstract public function setHours(array $hours);
}