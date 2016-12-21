<?php

/* base.html.twig */
class __TwigTemplate_7e80c17880fa3696bcfd24ce17dd2fac0f0f4021e5cad7df80338916d11a554a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
            'extra_script' => array($this, 'block_extra_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html class=\"no-js\" lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <title> User Panel </title>
    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"apple-touch-icon\" href=\"apple-touch-icon.png\">
    <!-- Place favicon.ico in the root directory -->
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/vendor.css"), "html", null, true);
        echo "\">
    <!-- Theme initialization -->

    ";
        // line 15
        // asset "bab4390"
        $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_bab4390") : $this->env->getExtension('asset')->getAssetUrl("css/public.css");
        // line 19
        echo " 
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl((isset($context["asset_url"]) ? $context["asset_url"] : null)), "html", null, true);
        echo "\" />
    ";
        unset($context["asset_url"]);
        // line 22
        echo "      
</head>

<body>
<div class=\"main-wrapper\">
    <div class=\"app\" id=\"app\">
        <header class=\"header\" style=\"left:0\">
            <div class=\"header-block header-block-nav\">
                <ul class=\"nav-profile\">
                    <li>
                        <a id=\"cart\" href=\"#\" class=\"nav-link btn btn-info\" role=\"button\">Cart</a>
                    </li>
                    <li class=\"profile dropdown\">
                        <a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\"
                           aria-expanded=\"false\">
                            <div class=\"img\"
                                 style=\"background-image: url('";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("user.png"), "html", null, true);
        echo "')\"></div> <span
                                    class=\"name\">
    \t\t\t      ";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
        echo "
    \t\t\t    </span> </a>

                        <div class=\"dropdown-menu profile-dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
                            <!--<a class=\"dropdown-item\" href=\"#\"> <i class=\"fa fa-user icon\"></i> Profile </a>
                            <a class=\"dropdown-item\" href=\"#\"> <i class=\"fa fa-bell icon\"></i> Notifications </a>
                            <a class=\"dropdown-item\" href=\"#\"> <i class=\"fa fa-gear icon\"></i> Settings </a>-->
                            ";
        // line 47
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
            // line 48
            echo "                                <a id=\"quickEditToggle\" class=\"dropdown-item\" href=\"#\"> <i class=\"fa fa-gear icon\"></i> Toggle Quick Edit </a>
                                <a class=\"dropdown-item\" href=\"";
            // line 49
            echo $this->env->getExtension('routing')->getPath("admin");
            echo "\"> <i class=\"fa fa-gear icon\"></i> Administration </a>
                            ";
        }
        // line 51
        echo "                            <a class=\"dropdown-item\" href=\"";
        echo $this->env->getExtension('routing')->getPath("fos_user_change_password");
        echo "\"> <i class=\"fa fa-user icon\"></i> change password </a>

                            <div class=\"dropdown-divider\"></div>
                            <a class=\"dropdown-item\" href=\"";
        // line 54
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\"> <i class=\"fa fa-power-off icon\"></i> Logout </a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        <div class=\"sidebar-overlay\" id=\"sidebar-overlay\"></div>
        <article class=\"content items-list-page\">
            ";
        // line 63
        $this->displayBlock('content', $context, $blocks);
        // line 65
        echo "        </article>
        
        ";
        // line 77
        echo "
        <!-- /.modal -->
        <div class=\"modal fade\" id=\"confirm-modal\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <h4 class=\"modal-title\"><i class=\"fa fa-warning\"></i> Alert</h4></div>
                    <div class=\"modal-body\">
                        <p>Are you sure want to do this?</p>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-primary\" id=\"doit\" data-dismiss=\"modal\">Yes</button>
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">No</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</div>
 


   ";
        // line 105
        $this->displayBlock('javascript', $context, $blocks);
        // line 142
        echo "    
    ";
        // line 143
        $this->displayBlock('extra_script', $context, $blocks);
        // line 145
        echo "    
</body>

</html>";
    }

    // line 63
    public function block_content($context, array $blocks = array())
    {
        // line 64
        echo "            ";
    }

    // line 105
    public function block_javascript($context, array $blocks = array())
    {
        echo "\t\t\t\t
        ";
        // line 106
        // asset "ea244bb"
        $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ea244bb") : $this->env->getExtension('asset')->getAssetUrl("js/scripts_public.js");
        // line 114
        echo " 

        <script type=\"text/javascript\" src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl((isset($context["asset_url"]) ? $context["asset_url"] : null)), "html", null, true);
        echo "\"></script>
       <script>
           \$( document ).ready(function() {
               \$('.paymentTypes').trigger('change');

               //delete me
//               \$('#form_zip_code').val('85132');
//               \$('#form_address1').val('85132');
//               \$('#form_first_name').val('85132');
//               \$('#form_last_name').val('85132');
//               \$('#form_city').val('85132');
//               \$('#form_state').val('85132');
//               \$('#form_country').val('85132');
//               \$('#form_ship_method').val('rush');
//               \$('#form_phone').val('3333333333');
//               \$('#form_email_address').val('wow@gmail.com');
//               \$('#form_card_number').val('370000000000002');
//               \$('#form_card_code').val('132');
//               \$('.paymentTypes').val('1Pay');
//               \$('#customder_fname').val('Ralph}}');
//               \$('#chosenProduct').val(1);
               \$('.showTable').hide();
           });
       </script>
        ";
        unset($context["asset_url"]);
        // line 140
        echo "\t
    ";
    }

    // line 143
    public function block_extra_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 143,  211 => 140,  183 => 116,  179 => 114,  176 => 106,  171 => 105,  167 => 64,  164 => 63,  157 => 145,  155 => 143,  152 => 142,  150 => 105,  120 => 77,  116 => 65,  114 => 63,  102 => 54,  95 => 51,  90 => 49,  87 => 48,  85 => 47,  75 => 40,  70 => 38,  52 => 22,  47 => 20,  44 => 19,  41 => 15,  35 => 12,  22 => 1,);
    }

    public function getSource()
    {
        return "<!doctype html>
<html class=\"no-js\" lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <title> User Panel </title>
    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"apple-touch-icon\" href=\"apple-touch-icon.png\">
    <!-- Place favicon.ico in the root directory -->
    <link rel=\"stylesheet\" href=\"{{ asset(\"css/vendor.css\") }}\">
    <!-- Theme initialization -->

    {% stylesheets combine=true output=\"css/public.css\" 
            'css/app-green.css'
            '@WebsiteCommonBundle/Resources/public/css/*'
            '@WebsitePublicBundle/Resources/public/css/*'
    %} 
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"{{ asset(asset_url) }}\" />
    {% endstylesheets %}
      
</head>

<body>
<div class=\"main-wrapper\">
    <div class=\"app\" id=\"app\">
        <header class=\"header\" style=\"left:0\">
            <div class=\"header-block header-block-nav\">
                <ul class=\"nav-profile\">
                    <li>
                        <a id=\"cart\" href=\"#\" class=\"nav-link btn btn-info\" role=\"button\">Cart</a>
                    </li>
                    <li class=\"profile dropdown\">
                        <a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\"
                           aria-expanded=\"false\">
                            <div class=\"img\"
                                 style=\"background-image: url('{{ asset(\"user.png\") }}')\"></div> <span
                                    class=\"name\">
    \t\t\t      {{app.user.username}}
    \t\t\t    </span> </a>

                        <div class=\"dropdown-menu profile-dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
                            <!--<a class=\"dropdown-item\" href=\"#\"> <i class=\"fa fa-user icon\"></i> Profile </a>
                            <a class=\"dropdown-item\" href=\"#\"> <i class=\"fa fa-bell icon\"></i> Notifications </a>
                            <a class=\"dropdown-item\" href=\"#\"> <i class=\"fa fa-gear icon\"></i> Settings </a>-->
                            {% if is_granted(\"ROLE_SUPER_ADMIN\") %}
                                <a id=\"quickEditToggle\" class=\"dropdown-item\" href=\"#\"> <i class=\"fa fa-gear icon\"></i> Toggle Quick Edit </a>
                                <a class=\"dropdown-item\" href=\"{{ path(\"admin\") }}\"> <i class=\"fa fa-gear icon\"></i> Administration </a>
                            {% endif %}
                            <a class=\"dropdown-item\" href=\"{{ path(\"fos_user_change_password\") }}\"> <i class=\"fa fa-user icon\"></i> change password </a>

                            <div class=\"dropdown-divider\"></div>
                            <a class=\"dropdown-item\" href=\"{{ path(\"fos_user_security_logout\") }}\"> <i class=\"fa fa-power-off icon\"></i> Logout </a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        <div class=\"sidebar-overlay\" id=\"sidebar-overlay\"></div>
        <article class=\"content items-list-page\">
            {% block content %}
            {% endblock %}
        </article>
        
        {#
        <footer class=\"footer\" style=\"left:0\">

            <div class=\"footer-block author\">
                <ul>
                    <li> created by <a href=\"#\">Crawl3r</a></li>
                    <li><a href=\"#\">get in touch</a></li>
                </ul>
            </div>
        </footer> #}

        <!-- /.modal -->
        <div class=\"modal fade\" id=\"confirm-modal\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <h4 class=\"modal-title\"><i class=\"fa fa-warning\"></i> Alert</h4></div>
                    <div class=\"modal-body\">
                        <p>Are you sure want to do this?</p>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-primary\" id=\"doit\" data-dismiss=\"modal\">Yes</button>
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">No</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</div>
 


   {% block javascript %}\t\t\t\t
        {% javascripts combine=true output=\"js/scripts_public.js\" 
                'js/vendor.js'
                'js/app.js'
                'js/jquery.mask.js'
                '@WebsiteCommonBundle/Resources/public/js/jquery-confirm.js'
                '@WebsitePublicBundle/Resources/public/js/jquery.payment.js'
                '@WebsitePublicBundle/Resources/public/js/soclean_public.js'
                'https://cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.min.js'
        %} 

        <script type=\"text/javascript\" src=\"{{ asset(asset_url) }}\"></script>
       <script>
           \$( document ).ready(function() {
               \$('.paymentTypes').trigger('change');

               //delete me
//               \$('#form_zip_code').val('85132');
//               \$('#form_address1').val('85132');
//               \$('#form_first_name').val('85132');
//               \$('#form_last_name').val('85132');
//               \$('#form_city').val('85132');
//               \$('#form_state').val('85132');
//               \$('#form_country').val('85132');
//               \$('#form_ship_method').val('rush');
//               \$('#form_phone').val('3333333333');
//               \$('#form_email_address').val('wow@gmail.com');
//               \$('#form_card_number').val('370000000000002');
//               \$('#form_card_code').val('132');
//               \$('.paymentTypes').val('1Pay');
//               \$('#customder_fname').val('Ralph}}');
//               \$('#chosenProduct').val(1);
               \$('.showTable').hide();
           });
       </script>
        {% endjavascripts %}\t
    {% endblock %}
    
    {% block extra_script %}
{% endblock %}
    
</body>

</html>";
    }
}
