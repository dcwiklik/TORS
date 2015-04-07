<?php
namespace Booking\Util;

class Collection implements \IteratorAggregate
{
    private $collection = array();

    public function getIterator()
    {
        return new \ArrayIterator($this->collection);
    }

    public function add($element, $key = null)
    {
        if ($key !== null) {
            $this->collection[$key] = $element;
        } else {
            $this->collection[] = $element;
        }
    }

    public function getByKey($key)
    {
        return isset($this->collection[$key]) ? $this->collection[$key] : false;
    }
}