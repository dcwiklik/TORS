<?php

namespace Booking;

use Booking\Core\Contact;
use Booking\Core\Factory;
use Booking\Core\PlaceFactory;
use Booking\Core\ReservationFactory;
use Booking\Core\Restaurant;

final class Demo
{
    private static $configFile = 'config.php';

    /**
     * @param App $app
     * @return mixed
     */
    public static function run(App $app)
    {
        $app->get('config')->setConfig(APP_ROOT . self::$configFile);

        $contact = new Contact();
        $contact->setPhone('505958845');

        $placeFactory = $app->get('placeFactory');
        $reservationFactory = $app->get('reservationFactory');

        $r = $placeFactory->createRestaurant('Restaurant', array());
        $r->addContact($contact);

        $h = $placeFactory->createHotel('Hotel', array());
        $h->addContact($contact);

        $reservation = $reservationFactory->createReservation();
        $reservation->setDatetimeFrom(new \DateTime());
        $h->addReservations($reservation);

        $reservation = $reservationFactory->createReservation();
        $reservation->setDatetimeFrom(new \DateTime());
        $h->addReservations($reservation);

        $demo = array(
            'restaurant' => $r,
            'hotel' => $h
        );

        return $demo;
    }
}

?>

