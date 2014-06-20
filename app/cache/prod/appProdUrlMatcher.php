<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/cadastro')) {
            // cyber_high_cadastro_homepage
            if (rtrim($pathinfo, '/') === '/cadastro') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'cyber_high_cadastro_homepage');
                }

                return array (  '_controller' => 'CyberHigh\\CadastroBundle\\Controller\\DefaultController::indexAction',  '_route' => 'cyber_high_cadastro_homepage',);
            }

            // cyber_high_cadastro_alunos
            if (0 === strpos($pathinfo, '/cadastro/alunos') && preg_match('#^/cadastro/alunos/(?P<actionName>[^/]++)/(?P<matricula>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cyber_high_cadastro_alunos')), array (  '_controller' => 'CyberHigh\\CadastroBundle\\Controller\\AlunoController::indexAction',));
            }

            // cyber_high_cadastro_professores
            if (0 === strpos($pathinfo, '/cadastro/professores') && preg_match('#^/cadastro/professores/(?P<actionName>[^/]++)/(?P<matricula>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cyber_high_cadastro_professores')), array (  '_controller' => 'CyberHigh\\CadastroBundle\\Controller\\ProfessorController::indexAction',));
            }

            // cyber_high_cadastro_turmas
            if (0 === strpos($pathinfo, '/cadastro/turmas') && preg_match('#^/cadastro/turmas/(?P<actionName>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cyber_high_cadastro_turmas')), array (  '_controller' => 'CyberHigh\\CadastroBundle\\Controller\\TurmaController::indexAction',));
            }

        }

        if (0 === strpos($pathinfo, '/loja')) {
            // pataconcio_loja_homepage
            if (rtrim($pathinfo, '/') === '/loja') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'pataconcio_loja_homepage');
                }

                return array (  '_controller' => 'Pataconcio\\LojaBundle\\Controller\\PedidoController::indexAction',  '_route' => 'pataconcio_loja_homepage',);
            }

            if (0 === strpos($pathinfo, '/loja/editar')) {
                // pataconcio_loja_incluir
                if ($pathinfo === '/loja/editar') {
                    return array (  '_controller' => 'Pataconcio\\LojaBundle\\Controller\\PedidoController::editarAction',  '_route' => 'pataconcio_loja_incluir',);
                }

                // pataconcio_loja_alterar
                if (preg_match('#^/loja/editar/(?P<pedido>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pataconcio_loja_alterar')), array (  '_controller' => 'Pataconcio\\LojaBundle\\Controller\\PedidoController::editarAction',));
                }

            }

            // pataconcio_loja_gravar
            if ($pathinfo === '/loja/gravar') {
                return array (  '_controller' => 'Pataconcio\\LojaBundle\\Controller\\PedidoController::gravarAction',  '_route' => 'pataconcio_loja_gravar',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
