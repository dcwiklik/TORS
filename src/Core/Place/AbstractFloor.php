<?php
namespace Booking\Core\Place;

abstract class AbstractFloor
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var Collection
     */
    protected $rooms;

    abstract public function getName();
    abstract public function setName($name);

    /**
     * @return Collection
     */
    abstract public function getRooms();

    /**
     * @param AbstractRoom $room
     * @param null $name
     * @return mixed
     */
    abstract public function addRoom(AbstractRoom $room, $name = null);
}