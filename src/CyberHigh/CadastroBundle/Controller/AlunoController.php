<?php
namespace CyberHigh\CadastroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CyberHigh\CadastroBundle\Entity\Aluno;

class AlunoController extends Controller
{

    public function indexAction($actionName, $matricula)
    {
        if ('editar' == $actionName) {
            return $this->editarAction($matricula);
        }
        if ('gravar' == $actionName) {
            return $this->gravarAction();
        }
        if ('excluir' == $actionName) {
            return $this->excluirAction($matricula);
        }
        
        $homePage = $this->get('router')->generate('cyber_high_cadastro_homepage');
        $editar = $this->get('router')->generate('cyber_high_cadastro_alunos', array(
            'actionName' => 'editar',
            'matricula' => 'index'
        ));
        
        $alunos = $this->getDoctrine()
            ->getRepository('CyberHighCadastroBundle:Aluno')
            ->findAll();
        
        return $this->render('CyberHighCadastroBundle:Aluno:index.html.twig', array(
            'homePage' => $homePage,
            'editar' => $editar,
            'alunos' => $alunos
        ));
    }

    public function editarAction($matricula)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CyberHighCadastroBundle:Aluno');
        $aluno = $repository->findOneBy(array(
            'matricula' => $matricula
        ));
        
        if (empty($aluno)) {
            $aluno = new Aluno();
        }
        
        $turmas = $this->getDoctrine()
            ->getRepository('CyberHighCadastroBundle:Turma')
            ->findAll();
        
        $choices = array();
        
        foreach ($turmas as $turma) {
            $choices[$turma->getId()] = $turma->getNome();
        }
        
        $form = $this->createFormBuilder()
            ->add('id', 'hidden', array(
            'attr' => array(
                'value' => $aluno->getId()
            )
        ))
            ->add('matricula', 'text', array(
            'attr' => array(
                'value' => $aluno->getMatricula()
            )
        ))
            ->add('nome', 'text', array(
            'attr' => array(
                'value' => $aluno->getNome()
            )
        ))
            ->
        add('data_de_nascimento', 'date', array(
            'format' => 'dd-MM-yyyy',
            'pattern' => '{{ day }}-{{ month }}-{{ year }}',
            'years' => range(1910, Date('Y', strtotime('-10 years'))), // Faixa de anos
            'input' => 'string'
        ))
            ->
        add('turma', 'choice', array(
            'choices' => $choices
        ))
            ->getForm();
        
        $action = $this->get('router')->generate('cyber_high_cadastro_alunos', array(
            'actionName' => 'gravar',
            'matricula' => 'index'
        ));
        
        $index = $this->get('router')->generate('cyber_high_cadastro_alunos', array(
            'actionName' => 'index',
            'matricula' => 'index'
        ));
        
        return $this->render('CyberHighCadastroBundle:Aluno:editar.html.twig', array(
            'action' => $action,
            'form' => $form->createView(),
            'index' => $index
        ));
    }

    public function gravarAction()
    {
        $http = Request::createFromGlobals();
        $form = $http->request->get('form');
        
        $id = $form['id'];
        $em = $this->getDoctrine()->getManager();
        $aluno = $em->find('CyberHigh\\CadastroBundle\\Entity\\Aluno', $id);
        
        if (empty($aluno))
            $aluno = new Aluno();
        
        $aluno->setMatricula($form['matricula']);
        $aluno->setNome($form['nome']);
        $aluno->setTurma($em->find('CyberHigh\\CadastroBundle\\Entity\\Turma', $form['turma']));
        $aluno->setDataDeNascimento($form['data_de_nascimento']);
        
        $em->persist($aluno);
        $em->flush();
        
        return $this->redirect($this->generateUrl('cyber_high_cadastro_alunos', array(
            'actionName' => 'index',
            'matricula' => 'index'
        )));
    }

    public function excluirAction($matricula)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CyberHighCadastroBundle:Aluno');
        $aluno = $repository->findOneBy(array(
            'matricula' => $matricula
        ));
        
        $em->remove($aluno);
        $em->flush();
        
        return $this->redirect($this->generateUrl('cyber_high_cadastro_alunos', array(
            'actionName' => 'index',
            'matricula' => 'index'
        )));
    }
}
