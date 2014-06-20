<?php
namespace CyberHigh\CadastroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CyberHigh\CadastroBundle\Entity\Turma;
use Symfony\Component\HttpFoundation\Request;

class TurmaController extends Controller
{

    public function indexAction($actionName, $id)
    {
        if ($actionName == 'editar')
            return $this->editarAction($id);
        if ($actionName == 'gravar')
            return $this->gravarAction();
        if ($actionName == 'excluir')
            return $this->excluirAction($id);
        
        $homePage = $this->get('router')->generate('cyber_high_cadastro_homepage');
        $editar = $this->get('router')->generate('cyber_high_cadastro_turmas', array(
            'actionName' => 'editar',
            'id' => 'index'
        ));
        
        $turmas = $this->getDoctrine()
            ->getRepository('CyberHighCadastroBundle:Turma')
            ->findAll();
        
        return $this->render('CyberHighCadastroBundle:Turma:index.html.twig', array(
            'homePage' => $homePage,
            'editar' => $editar,
            'turmas' => $turmas
        ));
    }

    public function editarAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $turma = $em->find('CyberHigh\\CadastroBundle\\Entity\\Turma', $id);
        
        if (empty($turma)) {
            $turma = new Turma();
        }
        
        $form = $this->createFormBuilder()
            ->add('id', 'hidden', array(
            'attr' => array(
                'value' => $turma->getId()
            )
        ))
            ->add('nome', 'text', array(
            'attr' => array(
                'value' => $turma->getNome()
            )
        ))
            ->getForm();
        
        $action = $this->get('router')->generate('cyber_high_cadastro_turmas', array(
            'actionName' => 'gravar',
            'id' => 'index'
        ));
        
        $index = $this->get('router')->generate('cyber_high_cadastro_turmas', array(
            'actionName' => 'index',
            'id' => 'index'
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
        $turma = $em->find('CyberHigh\\CadastroBundle\\Entity\\Turma', $id);
        
        if (empty($turma)) {
            $turma = new Turma();
        }
        
        $turma->setNome($form['nome']);
        
        $em->persist($turma);
        $em->flush();
        
        return $this->redirect($this->generateUrl('cyber_high_cadastro_turmas', array(
            'actionName' => 'index',
            'id' => 'index'
        )));
    }

    public function excluirAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $turma = $em->find('CyberHigh\\CadastroBundle\\Entity\\Turma', $id);
        
        $em->remove($turma);
        $em->flush();
        
        return $this->redirect($this->generateUrl('cyber_high_cadastro_turmas', array(
            'actionName' => 'index',
            'id' => 'index'
        )));
    }
}
