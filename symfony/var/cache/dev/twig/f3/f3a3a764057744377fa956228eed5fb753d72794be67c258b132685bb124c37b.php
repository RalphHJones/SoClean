<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_d393ebfe4d8f22d608fd43154375893c41e5dd63cf101d2f1719720b9f5a54b8 extends Twig_Template
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
        $__internal_6213f4253add34b683bd2e095ab6cfa6f83f0caf5fe454b69eaf28b86cde3d00 = $this->env->getExtension("native_profiler");
        $__internal_6213f4253add34b683bd2e095ab6cfa6f83f0caf5fe454b69eaf28b86cde3d00->enter($__internal_6213f4253add34b683bd2e095ab6cfa6f83f0caf5fe454b69eaf28b86cde3d00_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Security:login.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 7]> <html class=\"lt-ie9 lt-ie8 lt-ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 7]> <html class=\"lt-ie9 lt-ie8\" lang=\"en\"> <![endif]-->
<!--[if IE 8]> <html class=\"lt-ie9\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang=\"en\"> <!--<![endif]-->
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
  <title>Login Form</title>
  <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" />
  <!--[if lt IE 9]><script src=\"//html5shim.googlecode.com/svn/trunk/html5.js\"></script><![endif]-->
</head>
<body>
  <section class=\"container\">
    <div class=\"login\">
      <h1>Login</h1>
      <form method=\"post\" action=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\">
          ";
        // line 18
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 19
            echo "              <div align=\"center\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
            echo "</div>
          ";
        }
        // line 21
        echo "          <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />
        <p><input type=\"text\" id=\"username\" name=\"_username\" required=\"required\" placeholder=\"Username or Email\"></p>
        <p><input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" placeholder=\"Password\"></p>
        <p class=\"remember_me\">
          <label>
            <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\">
            Remember me on this computer
          </label>
        </p>
        <p class=\"submit\"><input type=\"submit\" id=\"_submit\" name=\"_submit\"  value=\"Login\"></p>
      </form>
    </div>

  </section>

</body>
</html>
";
        
        $__internal_6213f4253add34b683bd2e095ab6cfa6f83f0caf5fe454b69eaf28b86cde3d00->leave($__internal_6213f4253add34b683bd2e095ab6cfa6f83f0caf5fe454b69eaf28b86cde3d00_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 21,  49 => 19,  47 => 18,  43 => 17,  33 => 10,  22 => 1,);
    }

    public function getSource()
    {
        return "<!DOCTYPE html>
<!--[if lt IE 7]> <html class=\"lt-ie9 lt-ie8 lt-ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 7]> <html class=\"lt-ie9 lt-ie8\" lang=\"en\"> <![endif]-->
<!--[if IE 8]> <html class=\"lt-ie9\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang=\"en\"> <!--<![endif]-->
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
  <title>Login Form</title>
  <link rel=\"stylesheet\" href=\"{{ asset('css/style.css') }}\" />
  <!--[if lt IE 9]><script src=\"//html5shim.googlecode.com/svn/trunk/html5.js\"></script><![endif]-->
</head>
<body>
  <section class=\"container\">
    <div class=\"login\">
      <h1>Login</h1>
      <form method=\"post\" action=\"{{ path(\"fos_user_security_check\") }}\">
          {% if error %}
              <div align=\"center\">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
          {% endif %}
          <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token }}\" />
        <p><input type=\"text\" id=\"username\" name=\"_username\" required=\"required\" placeholder=\"Username or Email\"></p>
        <p><input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" placeholder=\"Password\"></p>
        <p class=\"remember_me\">
          <label>
            <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\">
            Remember me on this computer
          </label>
        </p>
        <p class=\"submit\"><input type=\"submit\" id=\"_submit\" name=\"_submit\"  value=\"Login\"></p>
      </form>
    </div>

  </section>

</body>
</html>
";
    }
}
