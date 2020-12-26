<?php 

namespace App\Database;

use PDO;

/**
 * Class which set connection with MySQL 
 */ 
class MySQLDriver extends DatabaseConnector
{
    /**
     * {@inheritdoc} 
     */ 
    public function getConnection(): PDO
    {
        $settings = $this->getSettings()['settings']['components']['database'];

        $pdo = new PDO("{$settings['driver']}:host={$settings['host']};db_name={$settings['db_name']}", $settings['db_user'], $settings['db_password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;    
    }
}
