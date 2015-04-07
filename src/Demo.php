<?php

namespace Booking;

use Booking\Core\Contact;
use Booking\Core\PlaceFactory;
use Booking\Core\ReservationFactory;

final class Demo
{
    private static $configFile = 'config.php';

    public static function run(App $app)
    {
        $app->getService('config')->setConfig(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . self::$configFile);

        $contact = new Contact();
        $contact->setPhone('505958845');

        $openHours = array(
            1 => array(
                array('08:00', '22:00')
            ),
            2 => array(
                array('08:00', '22:00')
            ),
            3 => array(
                array('08:00', '22:00')
            ),
            4 => array(
                array('08:00', '22:00')
            ),
            5 => array(
                array('08:00', '22:00')
            ),
            6 => array(
                array('08:00', '19:00'),
                array('22:00', '23:00'),
            ),
            7 => array(
                array('08:00', '22:00')
            )
        );

        //hours
        $r = PlaceFactory::createRestaurant('Restauracja Roberto', $openHours);
        $r->addContact('default', $contact);

        $h = PlaceFactory::createHotel('Hotel Amaretto', $openHours);
        $h->addContact('default', $contact);

        $reservation = ReservationFactory::createReservation();
        $reservation->setDate(date('Y-m-d H:i:s'));
        $h->addReservations($reservation);

        $reservation = ReservationFactory::createReservation();
        $reservation->setDate(date('Y-m-d H:i:s'));
        $h->addReservations($reservation);

        $demo = array(
            'restaurant' => $r,
            'hotel' => $h
        );

        return $demo;
    }
}