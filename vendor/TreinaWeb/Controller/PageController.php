<?php
namespace TreinaWeb\Controller;

use TreinaWeb\View\View;

abstract class PageController
{

    protected $view = null;

    protected $action = null;

    public function __construct()
    {
        $this->view = new View($this);
    }

    public function indexAction()
    {}

    /**
     *
     * @return \TreinaWeb\View\View
     */
    public function getView()
    {
        return $this->view;
    }

    public function preDispatch()
    {}

    /**
     * @param atring $action
     */
    public function dispatch($action)
    {
        $this->action = $action;
        $this->preDispatch();
        $this->$action();
        $this->postDispatch();
    }

    /**
     * renderiza a view apos executar a ação do controller
     */
    public function postDispatch()
    {
        $this->view->render($this->action);
    }
    
    public function getName()
    {
        $class = str_replace('Application\Controller\\', '', get_class($this));
        return str_replace('Controller', '', $class);
    }
    
    /**
     * Redireciona para outra ação no mesmo controller
     * @param string $action
     */
    protected function redirect($action)
    {
        $this->action = $action;
        $action .= 'Action';
        $this->$action();
    }
}
