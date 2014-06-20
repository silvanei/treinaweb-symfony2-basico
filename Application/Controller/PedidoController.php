<?php
namespace Application\Controller;

use TreinaWeb2\Controller\PageController;
use Application\Model\Pedido;

class PedidoController extends PageController
{
    
    public function indexAction() {
        $url = '?controller=pedido&action=editar';
        $pedido = new Pedido();
        $this->viewData['pedidos'] = $pedido->consultaPedidos();
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
        $pedido->gravaPedido($numero);
        $this->redirect('index');
    }

}
