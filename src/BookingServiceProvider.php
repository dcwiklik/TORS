<?php
namespace Booking;

use Booking\Util\Config;
use Booking\Core\PlaceFactory;
use Booking\Core\ReservationFactory;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class BookingServiceProvider
 * @package Booking
 */
class BookingServiceProvider implements ServiceProviderInterface
{
    /**
     * Register app container services
     * @param \Pimple\Container $pimple
     * @return \Pimple\Container
     */
    public function register(\Pimple\Container $pimple)
    {
        $pimple['config'] = new Config();

        $this->prepareFactories($pimple);

        return $pimple;
    }

    /**
     * Prepare and add factories to container
     * @param Container $pimple
     */
    private function prepareFactories(Container $pimple) {

        $pimple['placeFactory'] = function($pimple) {
            return new PlaceFactory();
        };

        $pimple['reservationFactory'] = function($pimple) {
            return new ReservationFactory();
        };

    }
}