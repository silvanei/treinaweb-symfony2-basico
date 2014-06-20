<?php
namespace TreinaWeb2\Controller;

use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\PhpEngine;

abstract class PageController
{

    protected $view = null;

    protected $action = null;

    protected $viewData = array();

    public function __construct($viewPath)
    {
        $class = get_class($this);
        $class = str_replace('Application\\Controller\\', '', $class);
        $class = str_replace('Controller', '', $class);
        
        $loader = new FilesystemLoader($viewPath . DIRECTORY_SEPARATOR . $class . DIRECTORY_SEPARATOR . '%name%');
        
        $this->view = new PhpEngine(new TemplateNameParser(), $loader);
    }

    public function indexAction()
    {}

    public function getView()
    {
        return $this->view;
    }

    public function preDispatch()
    {}

    public function dispatch($action)
    {
        $this->action = $action;
        $this->preDispatch();
        $this->$action();
        $this->postDispatch();
    }

    public function postDispatch()
    {
        $template = str_replace('Action', '', $this->action) . '.php';
        echo $this->view->render($template, $this->viewData);
    }

    public function getName()
    {
        $class = str_replace('Application\Controller\\', '', get_class($this));
        return str_replace('Controller', '', $class);
    }

    protected function redirect($action)
    {
        $this->action = $action;
        $action .= 'Action';
        $this->$action();
    }
}