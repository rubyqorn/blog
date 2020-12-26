<?php 

namespace App\Controllers;

use App\View\View;

/**
 * Base controller class 
 */ 
class Controller 
{
    /**
     * Templates handler
     * 
     * @var \App\View\View; 
     */ 
    protected View $view;

    /**
     * Initiate Controller constructor method
     * 
     * @return void 
     */ 
    public function __construct()
    {
        // TODO: Refactor dependency
        $this->view = new View;
    }
}
