<?php
namespace CyberHigh\CadastroBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CyberHigh\CadastroBundle\Entity\Professor;

class ProfessorController extends Controller
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
        $editar = $this->get('router')->generate('cyber_high_cadastro_professores', array(
            'actionName' => 'editar',
            'matricula' => 'index'
        ));
        
        $professores = $this->getDoctrine()
            ->getRepository('CyberHighCadastroBundle:Professor')
            ->findAll();
        
        return $this->render('CyberHighCadastroBundle:Professor:index.html.twig', array(
            'homePage' => $homePage,
            'editar' => $editar,
            'professores' => $professores
        ));
    }

    public function editarAction($matricula)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CyberHighCadastroBundle:Professor');
        $professor = $repository->findOneBy(array(
            'matricula' => $matricula
        ));
        
        if (empty($professor)) {
            $professor = new Professor();
        }
        
        $form = $this->createFormBuilder()
            ->add('id', 'hidden', array(
            'attr' => array(
                'value' => $professor->getId()
            )
        ))
            ->add('matricula', 'text', array(
            'attr' => array(
                'value' => $professor->getMatricula()
            )
        ))
            ->add('nome', 'text', array(
            'attr' => array(
                'value' => $professor->getNome()
            )
        ))
            ->getForm();
        
        $action = $this->get('router')->generate('cyber_high_cadastro_professores', array(
            'actionName' => 'gravar',
            'matricula' => 'index'
        ));
        
        $index = $this->get('router')->generate('cyber_high_cadastro_professores', array(
            'actionName' => 'index',
            'matricula' => 'index'
        ));
        
        return $this->render('CyberHighCadastroBundle:Professor:editar.html.twig', array(
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
        $professor = $em->find('CyberHigh\\CadastroBundle\\Entity\\Professor', $id);
        
        if (empty($professor))
            $professor = new Professor();
        
        $professor->setMatricula($form['matricula']);
        $professor->setNome($form['nome']);
        
        $em->persist($professor);
        $em->flush();
        
        return $this->redirect($this->generateUrl('cyber_high_cadastro_professores', array(
            'actionName' => 'index',
            'matricula' => 'index'
        )));
    }

    public function excluirAction($matricula)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CyberHighCadastroBundle:Professor');
        $professor = $repository->findOneBy(array(
            'matricula' => $matricula
        ));
        
        $em->remove($professor);
        $em->flush();
        
        return $this->redirect($this->generateUrl('cyber_high_cadastro_professores', array(
            'actionName' => 'index',
            'matricula' => 'index'
        )));
    }
}