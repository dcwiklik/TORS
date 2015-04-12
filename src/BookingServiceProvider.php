<?php
namespace Booking;

use Booking\Util\Dump;
use Booking\Util\Config;
use Booking\Core\Factory\ContactFactory;
use Booking\Core\Factory\PlaceFactory;
use Booking\Core\Factory\ReservationFactory;
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
        $this->prepareTwig($pimple);
        $this->prepareDumper($pimple);

        return $pimple;
    }

    /**
     * Prepare and add factories to container
     * @param Container $pimple
     */
    private function prepareFactories(Container $pimple)
    {
        $pimple['placeFactory'] = function($pimple) {
            return new PlaceFactory();
        };

        $pimple['reservationFactory'] = function($pimple) {
            return new ReservationFactory();
        };

        $pimple['contactFactory'] = function($pimple) {
            return new ContactFactory();
        };
    }

    /**
     * @param Container $pimple
     */
    private function prepareTwig(Container $pimple)
    {
        $pimple['twig'] = function($pimple) {

            $templatesDir = $pimple['config']->getParameter('system')['templatesDir'];

            $loader = new \Twig_Loader_Filesystem(APP_ROOT . $templatesDir);

            $twig = new \Twig_Environment($loader, array(
                //'cache' => '/path/to/compilation_cache',
            ));

            $twig->addExtension(new \Twig_Extension_Debug());

            return $twig;
        };

    }

    /**
     * @param Container $pimple
     */
    private function prepareDumper(Container $pimple)
    {
        $pimple['dumper'] = new Dump($pimple);
    }
}
