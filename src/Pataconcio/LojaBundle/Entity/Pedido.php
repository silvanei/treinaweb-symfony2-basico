<?php
namespace Pataconcio\LojaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pedidos")
 */
class Pedido
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $numero;

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }
}
