<?php

namespace App\Controllers\API;

use App\Models\Post;
use App\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Data access layer
     * 
     * @var \App\Models\Post 
     */ 
    private Post $postModel;

    /**
     * Initiates PostsController constructor method
     * 
     * @return void 
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
    }

    /**
     * Returns all posts from data with 
     * all fields. Posts have to be returned in JSON
     * format and if table is empty will be returned
     * error message
     * 
     * @return void 
     */ 
    public function all()
    {
        $posts = $this->postModel->getPosts();

        if (empty($posts)) {
            return $this->render('api/posts');
        }

        return $this->render('api/posts', compact('posts'));
    }

    /**
     * Returns metrics for posts in blog.
     * Contains quantity of created posts and 
     * a date of last created post
     * 
     * @return void 
     */ 
    public function stats()
    {
        $stats = [];

        $quantity = $this->postModel->getPostsQuantity();

        if (empty($quantity)) {
            return $this->render('api/posts_stats');
        }

        $stats = array_merge($stats, $quantity);

        $lastCreatedDate = $this->postModel->getDateOfLastCreatedPost();

        if (empty($lastCreatedDate)) {
            return $this->render('api/posts_stats');
        }

        $stats = array_merge($stats, $lastCreatedDate);

        return $this->render('api/posts_stats', compact('stats'));
    }
}
