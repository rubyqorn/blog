<?php 

namespace App\Http;

/**
 * Endpoint for all controllers.
 * 
 * Yes I know this not FrontController pattern in compatible 
 * with Core J2EE Patters. Lately have to be refactored with 
 * Command pattern 
 */ 
class FrontController implements FrontControllerInterface
{
    /**
     * Default controller name which 
     * have to be called when query 
     * string equal '' or '/'
     * 
     * @var string 
     */ 
    private const DEFAULT_CONTROLLER = 'IndexController';

    /**
     * Action name which implemented in IndexController
     * and which calling when query string equals '' or '/'
     * 
     * @var string 
     */ 
    private const DEFAULT_ACTION = 'index';

    /**
     * Controller name in \App\Controllers\ namespace
     * 
     * @var string 
     */ 
    private string $controller = self::DEFAULT_CONTROLLER;

    /**
     * Action name 
     * 
     * @var string  
     */ 
    private string $action = self::DEFAULT_ACTION;

    /**
     * Get parameters from query string 
     * which can be passed by default 
     * (?param1=value1&param2=value2)
     * 
     * @var string 
     */ 
    private array $params = [];

    /**
     * Default path name for IndexController
     * 
     * @var string 
     */ 
    private string $defaultPath = '/';

    /**
     * Registered routes.
     * Example:
     * 
     * $controller->register([
     *  'controller' => 'HomeController',
     *  'action' => 'index'
     * ]);
     * 
     * @var array
     */ 
    private array $definitions = [];

    /**
     * Current path name which will be parsed
     * using explode function
     * 
     * @var string 
     */ 
    private string $path;

    /**
     * Register new controller and action names
     * which will be mathched in run method
     * 
     * @param array $routeDefinitions
     * @return void 
     */ 
    public function register(array $routeDefinitions)
    {
        $this->definitions[] = $routeDefinitions;
    }

    /**
     * Parse query string and returns current path.
     * If current path equals '/' or empty string
     * sets '/'
     * 
     * @return string
     */ 
    public function parseUri()
    {
        $this->path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");

        if ($this->path == '' || $this->path == $this->defaultPath) {
            $this->path = '/';
        }
        
        return $this->path;
    }

    /**
     * Sets controller name which was passed from query
     * string 
     * 
     * @param string $controller 
     * @throws \Exception
     * @return void 
     */ 
    public function setController(string $controller)
    {
        $controller = '\App\Controllers\\'. ucfirst($controller);
        
        if (!class_exists($controller)) {
            throw new \Exception("Controller with {$controller} name doesn't exists");
        }

        $this->controller = $controller;
    }

    /**
     * Sets action name which was passed from query string  
     * 
     * @param string $action 
     * @throws \Exception
     * @return void
     */ 
    public function setAction(string $action)
    {
        $reflector = new \ReflectionClass($this->controller);

        if (!$reflector->hasMethod($action)) {
            throw new \Exception("Action '{$action}' name in controller '{$this->controller}' doesn't exists");
        }

        $this->action = $action;
    }

    /**
     * Sets GET parameters from query string 
     * to property name
     * 
     * @param array $options 
     * @return void
     */ 
    public function setParams(array $options = [])
    {
        $this->params = $options;
    }

    /**
     * Matches current path from query string 
     * with defined or registered routes from front controller
     * instance. If routes was matched returns defined
     * route array with route, controller and action
     * values or false if was not matched
     * 
     * @param string $path
     * @return array|bool  
     */ 
    public function matchPathWithRoutes(string $path)
    {
        foreach($this->definitions as $route) {
            if ($path == $route['route']) {
                return $route;
            }
        }

        return false;
    }

    /**
     * Run matching registered controller and action names
     * with query string.
     * 
     * Set controller, action and GET parameters from query
     * string. In loop match setted controller and action names
     * with registered definitions. Finally if all parameters
     * was mathed call action of controller
     * 
     * @return mixed
     */ 
    public function run()
    {
        $this->parseUri();
        $route = $this->matchPathWithRoutes($this->path);

        if (!$route) {
            throw new \Exception("Failed to match routes. Path '{$this->path}' not registered");
        }

        $this->setController($route['controller']);
        $this->setAction($route['action']);
        $this->setParams($_GET);

        return call_user_func_array([new $this->controller, $this->action], $this->params);
    }
}
