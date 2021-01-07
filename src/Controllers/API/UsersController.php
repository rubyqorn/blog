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

    /**
     * Returns unique user from database table
     * by id with username, id, img table rows
     * 
     * @param int $id
     * @return void 
     */ 
    public function getUserById(int $id)
    {
        $user = $this->userModel->getUserById($id);

        if (empty($user)) {
            return $this->render('api/user');
        }

        return $this->render('api/user', compact('user'));
    }

    /**
     * Updates users by unique id field.
     * Edits username and img fields in users
     * table and returns status message if user
     * was edited successfully
     * 
     * @return void 
     */ 
    public function edit()
    {
        $request = $this->getRequest();

        if (!$request->isMethod('POST')) {
            return $this->render('api/edit_user');
        }

        if (!$this->userModel->editUser($request->all())) {
            return $this->render('api/edit_user');
        }

        $status = "User with id {$request->post('id')} was edited";

        return $this->render('api/edit_user', compact('status'));
    }
}
