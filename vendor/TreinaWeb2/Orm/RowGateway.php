<?php
namespace TreinaWeb2\Orm;

class RowGateway
{

    protected $adapter = null;

    protected $element = null;

    protected $mapper = null;

    public function __construct($element, $adapter, $mapper)
    {
        $this->adapter = $adapter;
        $this->element = $element;
        $this->mapper = $mapper;
    }
    
    public function __get($name)
    {
        return $this->element[$name];
    }
    
    public function __set($name, $value)
    {
        $this->element[$name] = $value;
    }
    
    
        
        
}
