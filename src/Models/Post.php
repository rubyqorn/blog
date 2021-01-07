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
            "SELECT u.username, p.id, p.preview_text, p.title, p.body, p.created_at 
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
            "SELECT COUNT(*) AS posts_quantity FROM {$this->table}"
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

    /**
     * Updates posts title, preview_text and body
     * posts table rows by unique id field and returns
     * primitive bool data type
     * 
     * @return bool
     */ 
    public function editPost(array $fields)
    {
        $statement = $this->connection->prepare(
            "UPDATE {$this->table} SET = title = ? SET preview_text = ? SET body = ? WHERE id = ?"
        );

        return $statement->execute([
            $fields['title'], $fields['preview_text'], $fields['body'], $fields['id']
        ]);
    }
}
