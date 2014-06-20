<?php
namespace CyberHigh\CadastroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $cadastroAlunos = $this->get('router')->generate('cyber_high_cadastro_alunos', array(
            'actionName' => 'index',
            'matricula' => 'index'
        ));
        
        $cadastroProfessores = $this->get('router')->generate('cyber_high_cadastro_professores', array(
            'actionName' => 'index',
            'matricula' => 'index'
        ));
        
        $cadastroTurmas = $this->get('router')->generate('cyber_high_cadastro_turmas', array(
            'actionName' => 'index',
            'id' => 'index'
        ));
        
        $viewData = array(
            'cadastroAlunos' => $cadastroAlunos,
            'cadastroProfessores' => $cadastroProfessores,
            'cadastroTurmas' => $cadastroTurmas
        );
        
        return $this->render('CyberHighCadastroBundle:Default:index.html.twig', $viewData);
    }
}
