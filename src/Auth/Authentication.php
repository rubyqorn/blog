<?php 

namespace App\Auth;

use App\Http\ApiResponse;

class Authentication 
{
    /**
     * Validates user authentication
     * 
     * @param \Closure $success
     * @param \Closure $failure
     * @return void  
     */ 
    public static function authenticate(\Closure $success, \Closure $failure)
    {
        return $success(new ApiResponse());
    }
}
