<?php
namespace Application\Model;

use Application\Model\Mapper\Pedido as PedidoMapper;

class Pedido
{

    private $mapper = null;

    public function __construct()
    {
        $this->mapper = new PedidoMapper();        
    }
    
    public function consultaPedidos()
    {
        return $this->mapper->select();
    }
    
    public function gravaPedido($numero)
    {
        $pedido = $this->mapper->newRow();
        $pedido->numero = $numero;
        $pedido->save();
    }
}
