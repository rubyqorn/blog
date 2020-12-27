<?php 

namespace App\Controllers;

use App\Models\Post;

class PostController extends Controller 
{
    /**
     * Data access layer 
     * 
     * @var \App\Models\Post 
     */ 
    protected Post $postModel;

    /**
     * Initiate PostController constructor method 
     * 
     * @return void 
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
    }

    /**
     * Shows post by id
     * 
     * @param int $id 
     * @return void 
     */ 
    public function index(int $id)
    {
        $post = $this->postModel->getPostById($id);
        
        if (!$post) {
            return $this->render('error');
        }

        return $this->render('post', [
            'title', $post['0']['title'], 
            'post' => $post
        ]);
    }
}
