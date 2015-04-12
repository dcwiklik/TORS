<?php
namespace Booking\Core\Place;

use Booking\Util\Collection;

class Room extends AbstractRoom
{
    public function __construct($name)
    {
        $this->setName($name);
        $this->areas = new Collection();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAreas()
    {
        return $this->areas;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function addArea(AbstractRoomArea $area, $name = null)
    {
        $this->areas->add($area, $name);
    }
}