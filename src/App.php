<?php
namespace Booking;

use Booking\Core\Config;
use Pimple\Container;

final class App
{
    /**
     * @var \Pimple\Container
     */
    private $services;

    public function __construct()
    {
        $pimple = new Container();

        $serviceProvider = new BookingServiceProvider();
        $this->services = $serviceProvider->register($pimple);
    }

    public function getService($name)
    {
        return $this->services[$name];
    }
}