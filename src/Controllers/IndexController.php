<?php 

namespace App\Controllers;

use App\Models\Post;

class IndexController extends Controller
{
    /**
     * Data access layer
     * 
     * @var \App\Models\Post 
     */ 
    protected Post $postModel;

    /**
     * Initiate IndexController constructor method 
     * 
     * @return void
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
    }

    /**
     * Shows index page 
     * 
     * @return void
     */ 
    public function index()
    {
        $posts = $this->postModel->getPosts();

        if (!$posts) {
            return $this->render('error', ['title' => 'Error 404']);
        }

        return $this->render('index', [
            'title' => 'rubyqorn',
            'posts' => $posts
        ]);
    }
}
