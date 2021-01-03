<?php 

namespace App\Auth;

use App\Http\Request;

interface AuthInterface
{
    /**
     * @param \App\Http\Request $request
     * @return void 
     */ 
    public function setRequest(Request $request);

    /**
     * @return \App\Http\Request 
     */ 
    public function getRequest(): Request;

    /**
     * Handle authentication action
     * 
     * @return bool 
     */ 
    public function handle();
}
