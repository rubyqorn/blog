<?php 

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
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

    /**
     * Render pased view template
     * 
     * @param string $template
     * @param array $data 
     * @return void 
     */ 
    public function render(string $template, array $data = [])
    {
        return $this->view->render($template, $data);
    }

    /**
     * @return \App\Http\Request 
     */ 
    public function getRequest(): Request
    {
        return new Request();
    }

    /**
     * @return \App\Http\Response 
     */ 
    public function getResponse(): Response
    {
        return new Response();
    }
}
