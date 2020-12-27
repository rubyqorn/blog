<?php 

namespace App\View;

class View
{
    /**
     * Default path where contains all view files
     * 
     * @var string 
     */ 
    private string $defaultPath = 'views';

    /**
     * Render view from views/ directory with passed data in array
     * format. Template name must be paste withhout .php extension
     * and if views/ directory contains subdirectories you can use
     * '/' to separate (site/home).
     * 
     * @param string $templateName
     * @param array $data 
     * @return void 
     */ 
    public function render(string $templateName, array $data = [])
    {
        $path = dirname(__DIR__) . '/../'. $this->defaultPath . '/' . $templateName . '.php';

        if (!file_exists($path)) {
            throw new \Exception("Failed to require '{$path}', because doesn't exists");
        }

        if (!empty($data)) {
            ob_start();
            extract($data);
            ob_get_clean();
            return require_once($path);
        }

        return require_once($path);
    }    
}
