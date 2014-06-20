<?php

/* CyberHighCadastroBundle:Aluno:index.html.twig */
class __TwigTemplate_84e7a88ac53a71e3d1ac81c1edee16a66db3d6836049320e6f7a514191db3eea extends Twig_Template
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
        echo "\">Incluir aluno</a><br>
    
    <table>
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["alunos"]) ? $context["alunos"] : $this->getContext($context, "alunos")));
        foreach ($context['_seq'] as $context["_key"] => $context["aluno"]) {
            // line 8
            echo "        <tr>
            <td>
                <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cyber_high_cadastro_alunos", array("actionName" => "editar", "matricula" => $this->getAttribute((isset($context["aluno"]) ? $context["aluno"] : $this->getContext($context, "aluno")), "matricula"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["aluno"]) ? $context["aluno"] : $this->getContext($context, "aluno")), "matricula"), "html", null, true);
            echo "</a>
            </td>
            <td>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["aluno"]) ? $context["aluno"] : $this->getContext($context, "aluno")), "nome"), "html", null, true);
            echo "</td>
            <td>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["aluno"]) ? $context["aluno"] : $this->getContext($context, "aluno")), "turma"), "nome"), "html", null, true);
            echo "</td>
            <td>
                <a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cyber_high_cadastro_alunos", array("actionName" => "excluir", "matricula" => $this->getAttribute((isset($context["aluno"]) ? $context["aluno"] : $this->getContext($context, "aluno")), "matricula"))), "html", null, true);
            echo "\">X</a>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['aluno'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    </table>
    
    <a href=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["homePage"]) ? $context["homePage"] : $this->getContext($context, "homePage")), "html", null, true);
        echo "\">Página inicial</a>
";
    }

    public function getTemplateName()
    {
        return "CyberHighCadastroBundle:Aluno:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 21,  72 => 19,  62 => 15,  57 => 13,  53 => 12,  46 => 10,  42 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
