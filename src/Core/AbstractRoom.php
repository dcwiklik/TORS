<?php
namespace Booking\Core;

use Booking\Util\Collection;

abstract class AbstractRoom
{
    use GridTrait;

    /**
     * @var Collection
     */
    protected $tables;

    abstract public function getId();
    abstract public function getName();
    abstract public function getTables();
}