<?php
namespace Booking\Core\Place;

use Booking\Core\GridTrait;
use Booking\Util\Collection;

class RoomArea extends AbstractRoomArea
{
    use GridTrait;

    /**
     * @param $name
     * @param bool $tablesMode
     */
    public function __construct($name)
    {
        $this->setName($name);
        $this->tables = new Collection();
        $this->seats = new Collection();
    }

    /**
     * @return bool
     */
    public function isTablesMode()
    {
        return $this->tablesMode;
    }

    /**
     * @param $bool
     */
    public function setTablesMode($bool)
    {
        $this->tablesMode = $bool;
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
     * @param AbstractTable $table
     * @param null $name
     */
    public function addTable(AbstractTable $table, $name = null)
    {
        if ($this->isTablesMode() === false) {
            throw new \Exception('Room area is in the mode without tables, add seats to area directly.');
        }

        $this->setTablesMode(true);

        $this->tables->add($table, $name);
    }

    /**
     * @param AbstractSeat $seat
     */
    public function addSeat(AbstractSeat $seat)
    {
        if ($this->isTablesMode() === true) {
            throw new \Exception('Room area is in the tables mode, add seat to related tables.');
        }

        $this->setTablesMode(false);

        $this->seats->add($seat);
    }

    /**
     * @return Collection
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * @return Collection
     */
    public function getSeats()
    {
        return $this->seats;
    }
}