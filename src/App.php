<?php
namespace Booking;

use Booking\Core\Config;
use Booking\Core\PlaceFactory;
use Booking\Core\PlaceFactoryAbstract;
use Booking\Core\ReservationFactoryAbstract;
use Booking\Util\Container;

final class App
{
    /**
     * @var \Pimple\Container
     */
    private $container;

    public function __construct()
    {
        $pimple = new Container();

        $serviceProvider = new BookingServiceProvider();
        $this->container = $serviceProvider->register($pimple);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->container->get($key);
    }
}