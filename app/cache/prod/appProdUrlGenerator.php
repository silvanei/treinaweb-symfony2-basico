<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'cyber_high_cadastro_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'CyberHigh\\CadastroBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/cadastro/',    ),  ),  4 =>   array (  ),),
        'cyber_high_cadastro_alunos' => array (  0 =>   array (    0 => 'actionName',    1 => 'matricula',  ),  1 =>   array (    '_controller' => 'CyberHigh\\CadastroBundle\\Controller\\AlunoController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'matricula',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'actionName',    ),    2 =>     array (      0 => 'text',      1 => '/cadastro/alunos',    ),  ),  4 =>   array (  ),),
        'cyber_high_cadastro_professores' => array (  0 =>   array (    0 => 'actionName',    1 => 'matricula',  ),  1 =>   array (    '_controller' => 'CyberHigh\\CadastroBundle\\Controller\\ProfessorController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'matricula',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'actionName',    ),    2 =>     array (      0 => 'text',      1 => '/cadastro/professores',    ),  ),  4 =>   array (  ),),
        'cyber_high_cadastro_turmas' => array (  0 =>   array (    0 => 'actionName',    1 => 'id',  ),  1 =>   array (    '_controller' => 'CyberHigh\\CadastroBundle\\Controller\\TurmaController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'actionName',    ),    2 =>     array (      0 => 'text',      1 => '/cadastro/turmas',    ),  ),  4 =>   array (  ),),
        'pataconcio_loja_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pataconcio\\LojaBundle\\Controller\\PedidoController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/loja/',    ),  ),  4 =>   array (  ),),
        'pataconcio_loja_incluir' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pataconcio\\LojaBundle\\Controller\\PedidoController::editarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/loja/editar',    ),  ),  4 =>   array (  ),),
        'pataconcio_loja_alterar' => array (  0 =>   array (    0 => 'pedido',  ),  1 =>   array (    '_controller' => 'Pataconcio\\LojaBundle\\Controller\\PedidoController::editarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pedido',    ),    1 =>     array (      0 => 'text',      1 => '/loja/editar',    ),  ),  4 =>   array (  ),),
        'pataconcio_loja_gravar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Pataconcio\\LojaBundle\\Controller\\PedidoController::gravarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/loja/gravar',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
