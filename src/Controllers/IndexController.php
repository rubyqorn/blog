<?php 

namespace App\Controllers;

class IndexController extends Controller
{
    /**
     * Shows index page 
     * 
     * @return void
     */ 
    public function index()
    {
        return $this->render('index', ['title' => 'rubyqorn']);
    }
}
