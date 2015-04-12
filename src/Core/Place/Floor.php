<?php
namespace Booking\Core\Place;

use Booking\Util\Collection;

class Floor extends AbstractFloor
{
    public function __construct($name)
    {
        $this->setName($name);
        $this->rooms = new Collection();
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
     * @return Collection
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param AbstractRoom $room
     * @param null $name
     * @return mixed|void
     */
    public function addRoom(AbstractRoom $room, $name = null)
    {
        $this->rooms->add($room, $name);
    }
}