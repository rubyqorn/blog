<?php 

namespace App\Controllers\API;

use App\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller 
{
    /**
     * Data access layer
     * 
     * @var \App\Models\User 
     */ 
    private User $userModel;

    /**
     * Initiates UsersController constructor method
     * 
     * @return void 
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->userModel = new User();
    }

    /**
     * Grabs statistics about users.
     * Returns quantity of created users in blog
     * 
     * @return void
     */ 
    public function stats()
    {
        $stats = $this->userModel->getUsersQuantity();

        if (empty($stats)) {
            return $this->render('api/users_stats');
        }

        return $this->render('api/users_stats', compact('stats'));
    }
}
