<?php
namespace Application\Model\Mapper;

use TreinaWeb\Orm\Mapper;

class Pedido extends Mapper
{

    protected $table = 'pedidos';

    protected $primaryKey = 'numero';

    protected $adapter = null;
}