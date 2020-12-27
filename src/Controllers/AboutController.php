<?php 

namespace App\Controllers;

class AboutController extends Controller 
{
    public function index()
    {
        return $this->render('about', ['title' => 'Обо мне']);
    }
}
