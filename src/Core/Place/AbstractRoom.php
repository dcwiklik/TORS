<?php
namespace Booking\Core\Place;

use Booking\Core\GridTrait;
use Booking\Util\Collection;

abstract class AbstractRoom
{
    use GridTrait;

    /**
     * @var Collection
     */
    protected $areas;

    abstract public function __construct($name);

    abstract public function getName();
    abstract public function getAreas();

    abstract public function setName($name);
    abstract public function addArea(AbstractRoomArea $area, $name = null);
}