<?php 

namespace App\Config;

/**
 * Parses and contains settings from yaml file 
 */ 
class YAMLConfig extends Configuration
{
    /**
     * {@inheritdoc} 
     */ 
    public function extractSettings()
    {
        $this->settings = yaml_parse_file($this->configFile);    
    }
}
