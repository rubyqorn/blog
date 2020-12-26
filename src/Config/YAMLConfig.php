<?php 

namespace App\Config;

class YAMLConfig extends Configuration
{
    public function extractSettings()
    {
        $this->settings = yaml_parse_file($this->configFile);    
    }
}
