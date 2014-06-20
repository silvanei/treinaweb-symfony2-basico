<?php
namespace CyberHigh\CadastroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="turmas")
 */
class Turma
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
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $nome;

    /**
     * @ORM\OneToMany(targetEntity="Aluno", mappedBy="turma")
     *
     * @var ArrayCollection
     */
    private $alunos;

    /**
     * @ORM\ManyToMany(targetEntity="Professor", inversedBy="turmas")
     * @ORM\JoinTable(
     * name="professores_turma",
     *     joinColumns={@ORM\JoinColumn(name="id_turma", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_professor", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection
     */
    private $professores;

    public function __construct()
    {
        $this->professores = new ArrayCollection();
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

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getAlunos()
    {
        return $this->alunos;
    }

    public function setAlunos($alunos)
    {
        $this->alunos = $alunos;
        return $this;
    }

    public function getProfessores()
    {
        return $this->professores;
    }

    public function setProfessores($professores)
    {
        $this->professores = $professores;
        return $this;
    }
}
