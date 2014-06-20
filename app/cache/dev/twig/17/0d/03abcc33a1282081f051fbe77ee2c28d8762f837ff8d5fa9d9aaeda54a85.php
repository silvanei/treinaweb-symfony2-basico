<?php

/* CyberHighCadastroBundle:Professor:index.html.twig */
class __TwigTemplate_170d03abcc33a1282081f051fbe77ee2c28d8762f837ff8d5fa9d9aaeda54a85 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::cadastro.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::cadastro.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <a href=\"";
        echo twig_escape_filter($this->env, (isset($context["editar"]) ? $context["editar"] : $this->getContext($context, "editar")), "html", null, true);
        echo "\">Incluir professor</a><br>
    
    <table>
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["professores"]) ? $context["professores"] : $this->getContext($context, "professores")));
        foreach ($context['_seq'] as $context["_key"] => $context["professor"]) {
            // line 8
            echo "        <tr>
            <td>
                <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cyber_high_cadastro_professores", array("actionName" => "editar", "matricula" => $this->getAttribute((isset($context["professor"]) ? $context["professor"] : $this->getContext($context, "professor")), "matricula"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["professor"]) ? $context["professor"] : $this->getContext($context, "professor")), "matricula"), "html", null, true);
            echo "</a>
            </td>
            <td>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["professor"]) ? $context["professor"] : $this->getContext($context, "professor")), "nome"), "html", null, true);
            echo "</td>
            <td>
                <a href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cyber_high_cadastro_professores", array("actionName" => "excluir", "matricula" => $this->getAttribute((isset($context["professor"]) ? $context["professor"] : $this->getContext($context, "professor")), "matricula"))), "html", null, true);
            echo "\">X</a>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['professor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    </table>
    
    <a href=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["homePage"]) ? $context["homePage"] : $this->getContext($context, "homePage")), "html", null, true);
        echo "\">Página inicial</a>
";
    }

    public function getTemplateName()
    {
        return "CyberHighCadastroBundle:Professor:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 20,  68 => 18,  58 => 14,  53 => 12,  46 => 10,  42 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
