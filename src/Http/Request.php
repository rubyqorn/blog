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
}
