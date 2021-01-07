<?php 

namespace App\Http;

class Request
{
    /**
     * HTTP POST data 
     * 
     * @var array 
     */ 
    private array $postData = [];

    /**
     * Server data from $_SERVER const
     * 
     * @var array 
     */ 
    private array $serverData = [];

    /**
     * Initiate Request constructor method
     * 
     * @return void 
     */ 
    public function __construct()
    {
        $this->postData = $_POST;
        $this->serverData = $_SERVER;
    }

    /**
     * Returns specific HTTP POST data by key value or 
     * false if key was not found
     * 
     * @param string $key
     * @return bool|string
     */ 
    public function post(string $key)
    {
        return isset($this->postData[$key]) ? $this->postData[$key] : false;
    }

    /**
     * Returns all request data in array format.
     * 
     * @return array 
     */ 
    public function all()
    {
        return $this->postData;
    }

    /**
     * Validates if specified method name equals
     * called request method and returns bool
     * value. Method name argument must be in 
     * uppercase notation
     * 
     * @param string $methodName
     * @return vool 
     */ 
    public function isMethod(string $methodName)
    {
        if ($methodName === $methodName) {
            return true;
        }

        return false;
    }
}
