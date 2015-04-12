<?php
namespace Booking\Core\Place;

abstract class AbstractRoomArea
{
    /**
     * @var bool
     */
    protected $tablesMode;

    /**
     * @var Collection
     */
    protected $tables;

    /**
     * @var Collection
     */
    protected $seats;

    /**
     * @var
     */
    protected $name;

    abstract public function __construct($name);

    abstract public function isTablesMode();
    abstract public function setTablesMode($bool);

    abstract public function getName();
    abstract public function setName($name);

    abstract public function addTable(AbstractTable $table, $name = null);
    abstract public function addSeat(AbstractSeat $seat);

    abstract public function getTables();
    abstract public function getSeats();
}