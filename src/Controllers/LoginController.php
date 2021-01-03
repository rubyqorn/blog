<?php 

namespace App\Controllers;

use App\Auth\Login;

class LoginController extends Controller 
{
    /**
     * @var \App\Auth\Login 
     */ 
    private Login $loginHandler;

    /**
     * Initiate LoginController constructor method
     *  
     * @return void
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->loginHandler = new Login();
    }

    /**
     * Shows login form with title
     * 
     * @return void 
     */ 
    public function index()
    {
        $title = 'Войти в админ панель';

        return $this->render('auth/login', compact('title'));
    }

    /**
     * Handle login action and redirects
     * user to admin panel or back
     * 
     * @return void 
     */ 
    public function login()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        $this->loginHandler->setRequest($request);

        if (!$this->loginHandler->handle()) {
            $response->setHeaders('Location: /login/index');
            return $response->sendResponse();
        }

        setcookie(
            'admin-loged-in',
            $request->post('username'),
            time() + 86400
        );

        $response->setHeaders("Location: /admin/index");
        return $response->sendResponse();
    }
}
