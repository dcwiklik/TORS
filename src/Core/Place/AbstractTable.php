<?php
namespace Booking\Core\Place;

use Booking\Core\GridTrait;
use Booking\Util\Collection;

abstract class AbstractTable
{
    use GridTrait;

    /**
     * @var
     */
    protected $name;

    /**
     * @var Collection
     */
    protected $seats;

    abstract public function getName();
    abstract public function setName($name);

    abstract public function addSeat(AbstractSeat $seat, $name = null);
    abstract public function getSeats();
    abstract public function getSeatsCount();

    //abstract public function isAvailable();
    //abstract public function isAvailableOnDate(\DateTime $datetimeFrom, \DateTime $datetimeTo);
}