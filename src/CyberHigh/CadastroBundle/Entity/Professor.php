<?php
namespace CyberHigh\CadastroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="professores")
 */
class Professor
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $matricula;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $nome;

    /**
     * @ORM\ManyToMany(targetEntity="Turma", mappedBy="professores")
     * 
     * @var ArrayCollection
     */
    private $turmas;

    public function __construct()
    {
        $this->turmas = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getTurmas()
    {
        return $this->turmas;
    }

    public function setTurmas(ArrayCollection $turmas)
    {
        $this->turmas = $turmas;
        return $this;
    }
}
