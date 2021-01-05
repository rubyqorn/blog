<?php 

namespace App\Models;

use App\Database\Model;

class Post extends Model
{
    /**
     * Table name where will get and set data
     * 
     * @var string 
     */ 
    private string $table = 'posts';

    /**
     * Returns list of created posts. Post contain
     * title, id, body and created_at fields and 
     * returns in assoc format
     * 
     * @return array  
     */ 
    public function getPosts()
    {
        $statement = $this->connection->query(
            "SELECT id, title, preview_text, body, created_at FROM {$this->table}"
        );

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Returns single record by unique post id with
     * username, post title, body, created_at fields using
     * INNER JOIN. Record will be returned in assoc format 
     * 
     * @param int $id 
     * @return array
     */ 
    public function getPostById(int $id)
    {
        $statement = $this->connection->prepare(
            "SELECT u.username, p.title, blog.p.body, p.created_at 
                FROM {$this->table} p 
                INNER JOIN users u
                ON u.id = p.user_id 
                AND p.id = ?"
        );

        $statement->execute([$id]);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Returns quantity of created posts in blog
     * for metrics
     * 
     * @return array 
     */ 
    public function getPostsQuantity()
    {
        $statement = $this->connection->query(
            "SELECT COUNT(*) AS quantity FROM {$this->table}"
        );

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Returns date of last created post in timestamp
     * format
     * 
     * @return array 
     */ 
    public function getDateOfLastCreatedPost()
    {
        $statement = $this->connection->query(
            "SELECT created_at FROM {$this->table} ORDER BY created_at DESC LIMIT 1"
        );

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
