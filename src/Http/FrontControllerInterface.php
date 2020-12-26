<?php 

namespace App\Http;

interface FrontControllerInterface 
{
    /**
     * Sets controller name from query string
     * 
     * @param string $controller 
     * @return void 
     */ 
    public function setController(string $controller);

    /**
     * Sets action name from query string
     * 
     * @param string $action 
     * @return void 
     */ 
    public function setAction(string $action);

    /**
     * Sets GET parameters from query string
     * 
     * @param string $options 
     * @return void 
     */ 
    public function setParams(array $options = []);
    
    /**
     * Match and call registered route definitions
     * 
     * @return mixed 
     */  
    public function run();
}
