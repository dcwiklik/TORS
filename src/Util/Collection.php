<?php
namespace Booking\Util;

class Collection implements \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    private $collection = array();

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->collection);
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->getIterator()->count();
    }

    /**
     * @param $element
     * @param null $key
     */
    public function add($element, $key = null)
    {
        if ($key !== null) {
            $this->collection[$key] = $element;
        } else {
            $this->collection[] = $element;
        }
    }

    /**
     * @param $key
     * @return bool
     */
    public function getByKey($key)
    {
        return isset($this->collection[$key]) ? $this->collection[$key] : false;
    }
}