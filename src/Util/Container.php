<?php
namespace Booking\Util;

use Booking\Core\Config;
use Booking\Core\PlaceFactoryAbstract;
use Booking\Core\ReservationFactoryAbstract;

class Container extends \Pimple\Container
{
    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this[$key];
    }
}