<?php
namespace Booking\Core;

use Rhumsaa\Uuid\Uuid;

trait UuidTrait
{
    private $uuid = null;

    /**
     * @return null|Uuid
     */
    public function setId()
    {
        if ($this->uuid === null) {
            $uuid = Uuid::uuid1()->toString();
            $this->uuid = $uuid;
        }

        return $this->uuid;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->uuid;
    }
}