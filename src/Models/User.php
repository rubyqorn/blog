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
     * Returns users list, with id, username
     * img fields
     * 
     * @return array
     */ 
    public function getUsers()
    {
        $statement = $this->connection->query(
            "SELECT id, username, img FROM {$this->table}"
        );

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

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
     * Fetch user fields by id value.
     * Returns user id, username and img table rows by 
     * unique id field
     * 
     * @param int $id
     * @return array 
     */ 
    public function getUserById(int $id)
    {
        $statement = $this->connection->prepare(
            "SELECT id, username, img FROM {$this->table} WHERE id = ?"
        );

        $statement->execute([$id]);

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
            "SELECT COUNT(*) AS users_quantity FROM {$this->table}"
        );

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Updates posts username and img posts table rows 
     * by unique id field and returns primitive bool data type
     * 
     * @return bool
     */
    public function editUser(array $fields)
    {
        $statement = $this->connection->prepare(
            "UPDATE {$this->table} SET username = ? SET img = ? WHERE id = ?"
        );

        return $statement->execute([
            $fields['username'], $fields['img'], $fields['id']
        ]);
    }
}
