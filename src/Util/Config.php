<?php
namespace Booking\Util;

use Symfony\Component\Yaml\Yaml;

class Config
{
    private $type = 'yaml';
    private $config;

    public function setType($configFileType) {
        $this->type = $configFileType;
    }

    public function getParameter($index)
    {
        if (!isset($this->config[$index])) {
            throw new \Exception('Configuration property not found');
        }

        return $this->config[$index];
    }

    /**
     * @param $filePath
     */
    public function load($filePath)
    {
        switch ($this->type) {

            default:
            case 'yaml':
                $this->config = Yaml::parse(file_get_contents($filePath));
                break;

            case 'php':
                $this->config = require($filePath);
                break;
        }

        if (!is_array($this->config)) {
            throw new \Exception('configuration file not found or unreadable');
        }
    }
}
