<?php

namespace Booking;

use Booking\Core\Contact;
use Booking\Core\Factory;
use Booking\Core\PlaceFactory;
use Booking\Core\ReservationFactory;
use Booking\Core\Restaurant;

/**
 * Class Demo
 * @package Booking
 */
final class Demo
{
    /**
     * Run demo
     * @param App $app
     * @return mixed
     */
    public static function run(App $app)
    {
        $app->get('config')->load(APP_ROOT . 'config.yml');

        $contactFactory = $app->get('contactFactory');
        $placeFactory = $app->get('placeFactory');
        $reservationFactory = $app->get('reservationFactory');

        $contact = $contactFactory->createContact();
        $contact->setPhone('505958845');

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

