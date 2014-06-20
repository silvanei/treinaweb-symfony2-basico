<?php
namespace CyberHigh\CadastroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="alunos")
 */
class Aluno
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
     * @ORM\Column(name="data_de_nascimento", type="date")
     * 
     * @var \DateTime
     */
    private $dataDeNascimento;

    /**
     * @ORM\ManyToOne(targetEntity="Turma", inversedBy="alunos")
     * @ORM\JoinColumn(name="id_turma", referencedColumnName="id")
     * 
     * @var Turma
     */
    private $turma;

    public function __construct()
    {
        $this->dataDeNascimento = \DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
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

    public function getDataDeNascimento()
    {
        return $this->dataDeNascimento->format('d-m-Y');
    }
    
    /**
     * Recebe a data no formato array('year=> xxxx, ..., ...)
     * @param array $dataDeNascimento
     * @return \CyberHigh\CadastroBundle\Entity\Aluno
     */
    public function setDataDeNascimento($dataDeNascimento)
    {
        $this->dataDeNascimento = \DateTime::createFromFormat('Y-m-d', date('Y-m-d', strtotime(implode('-', $dataDeNascimento))));
        return $this;
    }

    public function getTurma()
    {
        return $this->turma;
    }

    public function setTurma(Turma $turma)
    {
        $this->turma = $turma;
        return $this;
    }
}
