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
     * Returns users list with theme id,
     * username, img fields. Response from
     * API have to be in JSON format 
     * 
     * @return void 
     */ 
    public function all()
    {
        $users = $this->userModel->getUsers();

        if (empty($users)) {
            return $this->render('api/users');
        }

        return $this->render('api/users', compact('users'));
    }
}
