<?php
namespace Application\Controller;

use TreinaWeb2\Controller\PageController;
use Application\Model\Pedido;

class PedidoController extends PageController
{
    
    public function indexAction() {
        $url = '?controller=pedido&action=editar';
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $GLOBALS['em'];
        $query = $em->createQuery("SELECT p FROM Application\Model\Pedido p");
        $pedidos = $query->getResult();
        
        $this->viewData['pedidos'] = $pedidos;
        $this->viewData['url'] = $url;        
    }
    
    public function editarAction()
    {
        $action = '?controller=pedido&action=gravar';
        $this->viewData['action'] = $action;
    }
    
    public function gravarAction()
    {
        $numero = $_POST['numero'];
        
        $pedido = new Pedido();
        $pedido->setNumero($numero);
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $GLOBALS['em'];
        $em->persist($pedido);
        $em->flush();
        
        $this->redirect('index');
    }

}
