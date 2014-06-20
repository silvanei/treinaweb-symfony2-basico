<?php
namespace TreinaWeb\Db;

use TreinaWeb\Db\Adapter\DbInterface;

class Adapter
{

    private $config = null;

    public function __construct(array $config)
    {
        $this->config = $config;
    }
    
    public function factory()
    {
        $db = $this->config['db'];
        
        $class = __NAMESPACE__ . '\Adapter\DbAdapter' . $db;
        if (!class_exists($class)) {
            echo $class;
            throw new \Exception('Adaptador "' . $db . '" não encontrado.');
        }        
        
        return new $class($this->config);
    }
}
