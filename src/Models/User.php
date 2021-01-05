<?php 

namespace App\Models;

use App\Database\Model;

/**
 * User model 
 */ 
class User extends Model
{
    /**
     * Default table name 
     * 
     * @var string 
     */ 
    private string $table = 'users';

    /**
     * Finds user by username value and returns
     * password and username
     * 
     * @param string $username 
     * @return array 
     */ 
    public function getUserByUsername(string $username)
    {
        $statement = $this->connection->prepare(
            "SELECT username, password FROM {$this->table} WHERE username = ?"
        );

        $statement->execute([$username]);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Returns quantity of available users in blog
     * 
     * @return array 
     */ 
    public function getUsersQuantity()
    {
        $statement = $this->connection->query(
            "SELECT COUNT(*) AS quantity FROM {$this->table}"
        );

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
