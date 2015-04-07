<?php
namespace Booking\Core;

class Config
{
    private $config;

    public function setConfig($file)
    {
        $this->config = require($file);
    }

    public function get($index)
    {
        if (!isset($this->config[$index])) {
            throw new \Exception('Configuration property not found');
        }

        return $this->config[$index];
    }
}
