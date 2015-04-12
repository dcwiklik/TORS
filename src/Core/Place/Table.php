<?php
namespace Booking\Core\Place;

use Booking\Util\Collection;

class Table extends AbstractTable
{
    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->setName($name);
        $this->seats = new Collection();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param AbstractSeat $seat
     * @param null $name
     */
    public function addSeat(AbstractSeat $seat, $name = null)
    {
        $this->seats->add($seat, $name);
    }

    /**
     * @return Collection
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @return int
     */
    public function getSeatsCount()
    {
        return $this->seats->getIterator()->count();
    }
}