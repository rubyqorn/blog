<?php 

namespace App\Database;

use PDO;
use App\Config\Configuration;

/**
 * Manipulation with database based on Transaction script
 * pattern. Have to be migrated on Domain Model 
 */ 
abstract class DatabaseConnector
{
    /**
     * Configuration file handler which
     * parse and returns settings
     * 
     * @var \App\Config\Configuration 
     */ 
    protected Configuration $config;

    /**
     * Database settings from config file
     * in array format
     * 
     * @var array 
     */ 
    protected array $settings;

    /**
     * Initialized connection using 
     * PDO PHP extension
     * 
     * @var \PDO 
     */ 
    protected PDO $connection;

    /**
     * Initiate DatabaseConstructor method and extact 
     * configuration file with database settings
     * 
     * @param \App\Config\Configuration $config 
     * @return void 
     */ 
    public function __construct(Configuration $config)
    {
        $this->config = $config;
        $this->extactConfig();
        $this->settings = $this->getSettings();
    }

    /**
     * Extract configuration file
     * 
     * @return void 
     */ 
    protected function extactConfig()
    {
        $this->config->extractSettings();
    }

    /**
     * Returns settings from extracted configuration
     * file 
     * 
     * @return array 
     */ 
    protected function getSettings()
    {
        return $this->config->getSettings();
    }

    /**
     * Set database connection using PDO extension
     * and settings from parsed configuration file
     * 
     * @return \PDO  
     */ 
    abstract public function getConnection(): PDO;
}
