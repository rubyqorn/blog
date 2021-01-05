<?php 

namespace App\Controllers\API;

use App\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class MetricsController extends Controller
{
    /**
     * Data access layer for posts table
     * 
     * @var \App\Models\Post 
     */ 
    protected Post $postModel;

    /**
     * Data access layer for users table
     * 
     * @var \App\Models\User 
     */ 
    protected User $userModel;

    /**
     * Initiate MetricsController constructor method
     * 
     * @return void 
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
        $this->userModel = new User();
    }

    /**
     * Returns metrics about application.
     * Contains quantity of posts, users and last 
     * created post date
     * 
     * @return void 
     */ 
    public function getMetrics()
    {
        $metrics = [];
        $postsQuantity = $this->postModel->getPostsQuantity();

        if (empty($postsQuantity)) {
            return $this->render('api/metrics');
        }

        $metrics = array_merge($metrics, $postsQuantity);
        $lastCreatedDate = $this->postModel->getDateOfLastCreatedPost();

        if (empty($lastCreatedDate)) {
            return $this->render('api/metrics');
        }

        $metrics = array_merge($metrics, $lastCreatedDate);
        $usersQuantity = $this->userModel->getUsersQuantity();

        if (empty($usersQuantity)) {
            return $this->render('api/metrics');
        }

        $metrics = array_merge($metrics, $usersQuantity);

        return $this->render('api/metrics', compact('metrics'));
    }
}
