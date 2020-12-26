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
     * Parse query string and returns controller and
     * action name in array format. First parameter
     * from query string must be controller name and
     * second must be action name. While sub directories
     * not available for definition
     * 
     * Example: 
     * [
     *  '0' => 'home'
     *  '1' => 'index'
     * ];
     * 
     * @return array
     */ 
    public function parseUri()
    {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");

        if ($path == '' || $path == $this->defaultPath) {
            return [
                'index', 
                'index'
            ];
        }
        
        return explode('/', $path);
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
        $controller = '\App\Controllers\\'. ucfirst($controller).'Controller';
        
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
        $parsedPath = $this->parseUri();

        $this->setController($parsedPath['0']);
        $this->setAction($parsedPath['1']);
        $this->setParams($_GET);

        $callController = '';
        $callAction = '';

        foreach($this->definitions as $definition) {
            $controller = '\App\Controllers\\'. $definition['controller'];
            
            if ($this->controller === $controller) {
                $callController = $controller;
            }

            if ($this->action === $definition['action']) {                    
                $callAction = $definition['action'];
            }
        }

        return call_user_func_array([new $callController, $callAction], $this->params);
    }
}
