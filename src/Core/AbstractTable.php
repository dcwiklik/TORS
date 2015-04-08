<?php
namespace Booking\Core;

use Booking\Util\Collection;

abstract class AbstractTable
{
    use GridTrait;

    /**
     * @var Collection
     */
    protected $seats;

    abstract public function getId();
    abstract public function getName();

    abstract public function getSeats();
    abstract public function getSeatsCount();

    abstract public function isAvailable();
    abstract public function isAvailableOnDate(\DateTime $datetimeFrom, \DateTime $datetimeTo);
}