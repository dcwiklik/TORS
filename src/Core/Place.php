<?php
namespace Booking\Core;

use Booking\Util\Collection;

class Place extends PlaceInterface {

    public function __construct()
    {
        $this->hours = new Collection();
        $this->contacts = new Collection();
        $this->reservations = new Collection();

        for ($i=1; $i<=7; $i++) {
            $this->hours->add(array(), $i);
        }
    }

    /**
     * @param array $hours
     */
    public function setHours(array $hours)
    {
        foreach ($hours as $dayIndex => $hours) {
            $this->hours->add($hours, $dayIndex);
        }
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Collection
     */
    public function getHours()
    {
        return $this->hours;
    }

    public function addContact(Contact $contact, $key = null)
    {
        $this->contacts->add($contact, ($key ? $key : count($this->contacts)));
    }

    public function addReservations($reservation)
    {
        $this->reservations->add($reservation);
    }

    /**
     * @return Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @return Contact
     */
    public function getContact($key = 1)
    {
        return $this->contacts->getByKey($key);
    }

    /**
     * @return Collection
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    //

    public function test()
    {
        $data = array();

        $data[] = $this->getName();
        $data[] = $this->getContacts()->getByKey('default')->getPhone();

        $res = '';

        $iterator = $this->getReservations()->getIterator();
        $iterator->rewind();

        while( $iterator->valid() ){
            $res .= '@' . $iterator->current()->getDate() . ' ';
            $iterator->next();
        }

        $iterator = $this->getHours()->getIterator();
        $iterator->rewind();

        $h = '';

        while( $iterator->valid() ){

            $dayIndex = $iterator->key();

            $res .= '#' . $dayIndex . '#';
            foreach ($iterator->current() as $hours) {
                $res .= implode('-', $hours);
            }

            $iterator->next();
        }

        $data[] = $h;

        $data[] = $res;

        return $data;
    }

}