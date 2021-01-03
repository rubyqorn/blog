<?php 

namespace App\Auth;

use App\Http\Request;
use App\Models\User;

class Login implements AuthInterface
{
    /**
     * Hash encoder and verifier
     * 
     * @var \App\Auth\Hash 
     */ 
    private Hash $hash;

    /**
     * User data access layer
     * 
     * @var \App\Models\User 
     */ 
    private User $user;

    /**
     * HTTP request handler
     * 
     * @var \App\Http\Request 
     */ 
    private Request $request;

    /**
     * Initiate Login constructor method
     * 
     * @return void 
     */ 
    public function __construct()
    {
        $this->user = new User();
        $this->hash = new Hash();
    }

    /**
     * @param \App\Http\Request $request
     * @return void 
     */ 
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return \App\Http\Request
     */ 
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * Returns POST data by specific key name
     * 
     * @param string $key
     * @return mixed 
     */ 
    public function getRequestData(string $key)
    {
        return $this->getRequest()->post($key);
    }

    /**
     * Finds user by username in database and returns
     * password and username values
     * 
     * @param string $username
     * @return array 
     */ 
    public function getUserData(string $username)
    {
        return $this->user->getUserByUsername($username);
    }

    /**
     * Login action which finds user in database
     * compare hash with password from form field
     * and returns bool value
     * 
     * @return bool 
     */ 
    public function handle()
    {
        $userData = $this->getUserData($this->getRequestData('username'));

        if (empty($userData)) {
            return false;
        }

        $verifiedPassword = $this->hash->verifyPassword(
            $this->getRequestData('password'),
            $userData['0']['password']
        );

        if (!$verifiedPassword) {
            return false;
        }

        return true;
    }
}
