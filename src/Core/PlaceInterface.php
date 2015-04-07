<?php
namespace Booking\Core;

use Booking\Util\Collection;

abstract class PlaceInterface
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var Collection
     */
    protected $hours;

    /**
     * @var Collection
     */
    protected $contacts;

    /**
     * @var Collection
     */
    protected $reservations;

    /**
     *
     */
    public abstract function __construct();

}