<?php 

namespace App\Database;

use App\Config\YAMLConfig;

/**
 * Abstraction for database access layers 
 */ 
abstract class Model extends MySQLDriver
{
    /**
     * Initiate Model constructor method and set PDO
     * connection for connection property. All manipulations
     * with database will be from $this->connection property
     * 
     * @return void 
     */ 
    public function __construct()
    {
        $config = new YAMLConfig(dirname(__DIR__) . '/../config/app.yaml');
        parent::__construct($config);

        $this->connection = $this->getConnection();
    }
}
