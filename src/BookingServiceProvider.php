<?php
namespace Booking;

use Booking\Util\Config;
use Booking\Core\PlaceFactory;
use Booking\Core\ReservationFactory;
use Pimple\ServiceProviderInterface;

class BookingServiceProvider implements ServiceProviderInterface
{
    /**
     * @param \Pimple\Container $pimple
     * @return \Pimple\Container
     */
    public function register(\Pimple\Container $pimple)
    {
        $pimple['config'] = new Config();

        $pimple['placeFactory'] = function($pimple) {
            return new PlaceFactory();
        };

        $pimple['reservationFactory'] = function($pimple) {
            return new ReservationFactory();
        };

        return $pimple;
    }
}