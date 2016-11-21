<?php

/* /home/freelabelnet/public_html/dev/themes/demo/pages/home.htm */
class __TwigTemplate_e96d361a56462c4979225831d413a23e0331b686a13690bc58592766bd315d4d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context['__cms_content_params'] = [];
        echo $this->env->getExtension('CMS')->contentFunction("hero-header.htm"        , $context['__cms_content_params']        );
        unset($context['__cms_content_params']);
        // line 2
        echo "
<div class=\"container\">
    <div class=\"container\">
        ";
        // line 5
        $context['__cms_content_params'] = [];
        echo $this->env->getExtension('CMS')->contentFunction("welcome.htm"        , $context['__cms_content_params']        );
        unset($context['__cms_content_params']);
        // line 6
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/home/freelabelnet/public_html/dev/themes/demo/pages/home.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 6,  28 => 5,  23 => 2,  19 => 1,);
    }
}
/* {% content "hero-header.htm" %}*/
/* */
/* <div class="container">*/
/*     <div class="container">*/
/*         {% content "welcome.htm" %}*/
/*     </div>*/
/* </div>*/
