<?php

/* discount-form-block.html.twig */
class __TwigTemplate_0b2b13b2807879f0928aedea5109ed9975ed928c9852d149e3f96c766f98ce01 extends Twig_Template
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
        echo "<div ";
        if ((array_key_exists("order", $context) && ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "type", array()) == "3Pay"))) {
            echo " style=\"display:none\" ";
        }
        echo " class=\"paymentText payText1Pay\">

    ";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "isdiscount", array()), 'widget', array("attr" => array("class" => "", "placeholder" => "")));
        echo "

    <div ";
        // line 5
        echo $this->env->getExtension('extensions')->quick_edit("setting", "pre_step_text_5");
        echo ">
        ";
        // line 6
        echo $this->env->getExtension('extensions')->twig_setting_function("pre_step_text_5");
        echo "
    </div>

    ";
        // line 9
        if ( !(null === $this->env->getExtension('extensions')->twig_setting_function("discount_amount_1"))) {
            // line 10
            echo "        <div class=\"form-group\">
            <label class=\"control-label\">
                <input id=\"discount30\" value=\"1\" data-value=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('extensions')->twig_setting_function("discount_amount_1"), "html", null, true);
            echo "\" class=\"discountOption\" ";
            if ((array_key_exists("order", $context) && ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isdiscount", array()) == 1))) {
                echo " checked=\"checked\" ";
            }
            echo " type=\"checkbox\" /> Apply \$";
            echo twig_escape_filter($this->env, $this->env->getExtension('extensions')->twig_setting_function("discount_amount_1"), "html", null, true);
            echo " Discount & Free Shipping
            </label>
        </div>
    ";
        }
        // line 16
        echo "
    ";
        // line 17
        if ( !(null === $this->env->getExtension('extensions')->twig_setting_function("discount_amount_2"))) {
            // line 18
            echo "        <div class=\"form-group\">
            <label class=\"control-label\">
                <input id=\"discount60\" value=\"2\" data-value=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('extensions')->twig_setting_function("discount_amount_2"), "html", null, true);
            echo "\" class=\"discountOption\" ";
            if ((array_key_exists("order", $context) && ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isdiscount", array()) == 2))) {
                echo " checked=\"checked\" ";
            }
            echo " type=\"checkbox\" /> Apply \$";
            echo twig_escape_filter($this->env, $this->env->getExtension('extensions')->twig_setting_function("discount_amount_2"), "html", null, true);
            echo " Discount
            </label>
        </div>
    ";
        }
        // line 24
        echo "
    ";
        // line 25
        if ( !(null === $this->env->getExtension('extensions')->twig_setting_function("discount_amount_3"))) {
            // line 26
            echo "        <div class=\"form-group\">
            <label class=\"control-label\">
                <input id=\"refurb\" value=\"3\" data-id=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["refurb"]) ? $context["refurb"] : null), "id", array()), "html", null, true);
            echo "\" data-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["refurb"]) ? $context["refurb"] : null), "name", array()), "html", null, true);
            echo "\" data-value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["refurb"]) ? $context["refurb"] : null), "price", array()), "html", null, true);
            echo "\" class=\"discountOption\" name=\"discountOption\" ";
            if ((array_key_exists("order", $context) && ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isdiscount", array()) == 3))) {
                echo " checked=\"checked\" ";
            }
            echo " type=\"checkbox\" /> Apply \$";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["refurb"]) ? $context["refurb"] : null), "price", array()), "html", null, true);
            echo " Refurb
            </label>
        </div>
    ";
        }
        // line 32
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "discount-form-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 32,  92 => 28,  88 => 26,  86 => 25,  83 => 24,  70 => 20,  66 => 18,  64 => 17,  61 => 16,  48 => 12,  44 => 10,  42 => 9,  36 => 6,  32 => 5,  27 => 3,  19 => 1,);
    }

    public function getSource()
    {
        return "<div {% if order is defined and order.type == '3Pay' %} style=\"display:none\" {% endif %} class=\"paymentText payText1Pay\">

    {{ form_widget(form.isdiscount, { 'attr': {'class': '', 'placeholder': '' } }) }}

    <div {{ quick_edit('setting', 'pre_step_text_5') | raw }}>
        {{ setting('pre_step_text_5') | raw }}
    </div>

    {% if setting('discount_amount_1') is not null %}
        <div class=\"form-group\">
            <label class=\"control-label\">
                <input id=\"discount30\" value=\"1\" data-value=\"{{ setting('discount_amount_1') }}\" class=\"discountOption\" {% if order is defined and  order.isdiscount == 1 %} checked=\"checked\" {% endif %} type=\"checkbox\" /> Apply \${{ setting('discount_amount_1') }} Discount & Free Shipping
            </label>
        </div>
    {% endif %}

    {% if setting('discount_amount_2') is not null %}
        <div class=\"form-group\">
            <label class=\"control-label\">
                <input id=\"discount60\" value=\"2\" data-value=\"{{ setting('discount_amount_2') }}\" class=\"discountOption\" {% if order is defined and order.isdiscount == 2 %} checked=\"checked\" {% endif %} type=\"checkbox\" /> Apply \${{ setting('discount_amount_2') }} Discount
            </label>
        </div>
    {% endif %}

    {% if setting('discount_amount_3') is not null %}
        <div class=\"form-group\">
            <label class=\"control-label\">
                <input id=\"refurb\" value=\"3\" data-id=\"{{refurb.id}}\" data-name=\"{{refurb.name}}\" data-value=\"{{refurb.price}}\" class=\"discountOption\" name=\"discountOption\" {% if order is defined and order.isdiscount == 3 %} checked=\"checked\" {% endif %} type=\"checkbox\" /> Apply \${{ refurb.price }} Refurb
            </label>
        </div>
    {% endif %}

</div>";
    }
}
