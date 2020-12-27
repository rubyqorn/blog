<?php 

namespace App\Controllers;

class AboutController extends Controller 
{
    /**
     * Shows about page
     * 
     * @return void 
     */ 
    public function index()
    {
        return $this->render('about', ['title' => 'Обо мне']);
    }
}
