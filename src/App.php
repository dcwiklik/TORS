<?php
namespace Booking;

use Booking\Core\Config;
use Booking\Core\PlaceFactory;
use Booking\Core\PlaceFactoryAbstract;
use Booking\Core\ReservationFactoryAbstract;
use Booking\Util\Container;

/**
 * Class App
 * @package Booking
 */
final class App
{
    /**
     * @var Booking/Util/Container;
     */
    private $container;

    /**
     * Create app object
     */
    public function __construct()
    {
        $pimple = new Container();

        $serviceProvider = new BookingServiceProvider();
        $this->container = $serviceProvider->register($pimple);
    }

    /**
     * Get app container service
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->container->get($key);
    }
}