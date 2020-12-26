<?php 

namespace App\Config;

/**
 * Abstraction for configuration file parsers 
 */ 
abstract class Configuration
{
    /**
     * Configuration file with settings
     * 
     * @var string 
     */ 
    protected string $configFile;

    /**
     * Extracted settings from configuraton file
     * 
     * @var array 
     */ 
    protected array $settings;

    /**
     * Initiate Configuration constructor method and 
     * validate configuration file existence
     * 
     * @param string $configFile
     * @throws \Exception
     * @return void 
     */ 
    public function __construct(string $configFile)
    {
        if (!file_exists($configFile)) {
            throw new \Exception("Configuration file '{$configFile}' doesn't exists or wrong path");
        }

        $this->configFile = $configFile;
    }   

    /**
     * Returns settings array. Must be called
     * after extractSettings method
     * 
     * @return array 
     */ 
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Parse configuration file
     * 
     * @return void 
     */ 
    abstract public function extractSettings();
}
