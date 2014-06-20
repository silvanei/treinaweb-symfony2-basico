<?php
namespace Pataconcio\LojaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Pataconcio\LojaBundle\Entity\Pedido;

class PedidoController extends Controller
{

    public function indexAction()
    {
        $pedidos = $this->getDoctrine()
            ->getRepository('PataconcioLojaBundle:Pedido')
            ->findAll();
        
        $viewData = array(
            'url' => '/loja/editar',
            'pedidos' => $pedidos
        );
        
        return $this->render('PataconcioLojaBundle:Pedido:index.html.twig', $viewData);
    }

    public function editarAction()
    {
        $form = $this->createFormBuilder()
            ->add('numero', 'text')
            ->getForm();
        
        $viewData = array(
            'action' => '/loja/gravar',
            'form' => $form->createView()
        );
        
        return $this->render('PataconcioLojaBundle:Pedido:editar.html.twig', $viewData);
    }

    public function gravarAction()
    {
        $http = Request::createFromGlobals();
        $form = $http->request->get('form');
        
        $pedido = new Pedido();
        $pedido->setNumero($form['numero']);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($pedido);
        $em->flush();
        
        return $this->redirect('/loja');
    }
}
