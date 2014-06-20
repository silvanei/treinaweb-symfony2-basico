<?php

/* CyberHighCadastroBundle:Default:index.html.twig */
class __TwigTemplate_9b9e578cc75bc1a6b57da45062b21769a2f4e45ebe39b4b16eae19f261eeb710 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["cadastroAlunos"]) ? $context["cadastroAlunos"] : $this->getContext($context, "cadastroAlunos")), "html", null, true);
        echo "\">Alunos</a><br />
    <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["cadastroProfessores"]) ? $context["cadastroProfessores"] : $this->getContext($context, "cadastroProfessores")), "html", null, true);
        echo "\">Professores</a><br />
    <a href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["cadastroTurmas"]) ? $context["cadastroTurmas"] : $this->getContext($context, "cadastroTurmas")), "html", null, true);
        echo "\">Turmas</a><br />
";
    }

    public function getTemplateName()
    {
        return "CyberHighCadastroBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  36 => 5,  31 => 4,  28 => 3,);
    }
}
