<?php
namespace Booking;

use Booking\Core\Config;
use Pimple\ServiceProviderInterface;

class BookingServiceProvider implements ServiceProviderInterface
{
    public function register(\Pimple\Container $pimple)
    {
        $pimple['config'] = new Config();

        return $pimple;
    }
}