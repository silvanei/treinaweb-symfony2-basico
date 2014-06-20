<?php
namespace TreinaWeb\Controller;

class FrontController
{

    private static $instance = null;

    private $path = null;

    private function __construct()
    {}

    private function __clone()
    {}

    private function __sleep()
    {}

    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     *
     * @return FrontController
     */
    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function dispatch()
    {
        $controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        
        $controller = 'Application\\Controller\\' . ucfirst($controller) . 'Controller';
        $action .= 'Action';
        
        $controller = new $controller();
        $controller->getView()->setPath($this->path);
        $controller->dispatch($action);
        
    }
}
