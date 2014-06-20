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
}