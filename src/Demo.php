<?php

namespace Booking;

use Booking\Core\Place\AbstractCinema;
use Booking\Core\Contact\Contact;
use Booking\Core\Factory;
use Booking\Core\Place\AbstractPlace;
use Booking\Core\Place\Floor;
use Booking\Core\Place\Place;
use Booking\Core\Place\Room;
use Booking\Core\Place\RoomArea;
use Booking\Core\Place\Seat;
use Booking\Core\Place\Table;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class Demo
 * @package Booking
 */
final class Demo
{
    private static $app;

    /**
     * Run demo
     * @param App $app
     * @return mixed
     */
    public static function run(App $app)
    {
        static::$app = $app;

        $app->get('config')->load(APP_ROOT . 'config.yml');

        $demo = self::demo2($app);
        $demo['app'] = $app;

        return $demo;
    }

    public static function renderView($file, $params)
    {
        $twig = static::$app->get('twig');

        return $twig->render($file, $params);
    }

    /**
     * Demo from method
     * @param $app
     * @return array
     * @throws \Exception
     */
    private static function demo1($app)
    {
        $contactFactory = $app->get('contactFactory');
        $placeFactory = $app->get('placeFactory');
        $reservationFactory = $app->get('reservationFactory');

        $contact = $contactFactory->createContact();
        $contact->set('505958845', Contact::FIELD_PHONE);
        $contact->set('Kraków', Contact::FIELD_ADDRESS_CITY);

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

        /**
         * @var AbstractCinema $c
         */
        $c = $placeFactory->createCinema('Cinema', array());

        $floor = new Floor('Floor 1');
        $floor->addRoom(new Room('Room 1 in Floor 1'));

        $room = new Room('Room 2 in Floor 1');

        $ra1 = new RoomArea('Pod oknem');
        $ra2 = new RoomArea('Przy drzwiach', 'PD');

        $ra1->addSeat(new Seat());
        $ra1->addSeat(new Seat());

        $t1 = new Table('T1');
        $ra2->addTable($t1);

        $room->addArea($ra1);
        $room->addArea($ra2);

        $floor->addRoom($room);

        $c->addFloor($floor);

        $demo = array(
            'places' => array(
                'restaurant' => $r,
                'hotel' => $h,
                'cinema' => $c
            )
        );

        return $demo;
    }

    /**
     * Demo from config
     * @param $app
     * @return array
     */
    private static function demo2($app)
    {
        $contactFactory = $app->get('contactFactory');
        $placeFactory = $app->get('placeFactory');
        $reservationFactory = $app->get('reservationFactory');

        $places = $app->get('config')->getParameter('places');
        $placesObjects = [];

        foreach ($places as $place) {

            switch ($place['type']) {
                case 'restaurant':
                    $placeObject = $placeFactory->createRestaurant($place['name'], $place['openHours']);
                    break;

                case 'cinema':
                    $placeObject = $placeFactory->createCinema($place['name'], $place['openHours']);
                    break;

                case 'hotel':
                    $placeObject = $placeFactory->createHotel($place['name'], $place['openHours']);
                    break;
            }

            //contact
            if (isset($place['contacts']) && is_array($place['contacts']))

                foreach ($place['contacts'] as $contact) {
                $contactObject = $contactFactory->createContact();

                $contactObject->set($contact['phone'], Contact::FIELD_PHONE);
                $contactObject->set($contact['address_city'], Contact::FIELD_ADDRESS_CITY);

                $placeObject->addContact($contactObject);
            }

            $a = array(
                'floor1' => array(
                    'name' => 'Piętro 1',
                    'rooms' => array(
                        'room1' => array(
                            'name' => 'Sala 1',
                            'areas' => array(
                                'area1' => array(
                                    'name' => 'Area 1',
                                    'tables' => array(
                                        'table1' => array(
                                            'name' => 'Stolik 1',
                                            'seats' => 5
                                        )
                                    )
                                ),

                                'area2' => array(
                                    'name' => 'Area 2',
                                    'tables' => false,
                                    'seats' => array(
                                        'table1' => array(
                                            'name' => 'Stolik 1',
                                            'seats' => 5
                                        )
                                    )
                                )
                            )
                        )
                    )
                )
            );

//            echo serialize($a);
//
//            //var_dump($a);
//            die;

            //structure
            if (isset($place['structure']) && is_array($place['structure'])) {

//                VarDumper::dump($place['structure']);
//                die;

                /**
                 * @var Place $placeObject
                 */

                foreach ($place['structure'] as $floor) {
                    $f = new Floor($floor['name']);

                    foreach ($floor['rooms'] as $room) {

                        $r = new Room($room['name']);

                        foreach ($room['areas'] as $area) {

                            $a = new RoomArea($area['name']);

                            if (isset($area['tables']) && is_array($area['tables'])) {

                                foreach ($area['tables'] as $table) {

                                    $t = new Table($table['name']);

                                    for ($i=0; $i<intval($table['seats']); $i++) {
                                        $t->addSeat(new Seat());
                                    }

                                    $a->addTable($t);
                                }

                            } elseif (isset($area['seats']) && $area['seats']) {

                                for ($i=0; $i<intval($area['seats']); $i++) {
                                    $a->addSeat(new Seat());
                                }
                            }

                            $r->addArea($a);
                        }

                        $f->addRoom($r);
                    }


                    $placeObject->addFloor($f);
                }

            }

            $placesObjects[] = $placeObject;
        }

        return array(
            'places' => $placesObjects
        );
    }
}

?>
