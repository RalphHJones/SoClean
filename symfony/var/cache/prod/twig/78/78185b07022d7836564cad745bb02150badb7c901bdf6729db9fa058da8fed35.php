<?php

/* default/index.html.twig */
class __TwigTemplate_ff2f9438df0f61d329d59aac0fb13afc0758f7f0f5608c0ae089688d9fece402 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/index.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"container\">
        ";
        // line 6
        if ((isset($context["message"]) ? $context["message"] : null)) {
            // line 7
            echo "            <div class=\"row col-md-offset-3\">
                <div class=\"alert alert-success col-md-8\">
                    <center>";
            // line 9
            echo (isset($context["message"]) ? $context["message"] : null);
            echo "</center>
                </div>
            </div>
        ";
        }
        // line 13
        echo "        <div class=\"showTable\">
        </div>

        <div class=\"stepwizard col-md-offset-3\">
            <div class=\"stepwizard-row setup-panel\">
                <div class=\"stepwizard-step\">
                    <a href=\"#step-1\" type=\"button\" class=\"btn btn-primary btn-circle\">1</a>
                    <p>Intro</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-2\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">2</a>
                    <p>Pre-Steps</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-3\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">3</a>
                    <p>Extras</p>
                </div>

                <div class=\"stepwizard-step\">
                    <a href=\"#step-4\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">4</a>
                    <p>Billing</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-5\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">5</a>
                    <p>General</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-6\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">6</a>
                    <p>Payment Details</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-7\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">7</a>
                    <p>Shipping</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-8\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">8</a>
                    <p>Final Transaction</p>
                </div>
            </div>
        </div>

        <form data-shipping-charge-threepay-additional-product=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('extensions')->twig_setting_function("3pay_shipping_charge_additional_product"), "html", null, true);
        echo "\"
              data-shipping-charge-rush-shipping=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('extensions')->twig_setting_function("rush_shipping_charge_additional_product"), "html", null, true);
        echo "\"
              data-first-payment-amount=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('extensions')->twig_setting_function("first_payment_3pay"), "html", null, true);
        echo "\" 
              
              id=\"mainForm\" autocomplete=\"off\" role=\"form\" method=\"post\">
";
        // line 60
        echo "            <div class=\"row setup-content\" id=\"step-1\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">

                        <div ";
        // line 64
        echo $this->env->getExtension('extensions')->quick_edit("setting", "intro_text_1");
        echo ">
                            ";
        // line 65
        echo $this->env->getExtension('extensions')->twig_setting_function("intro_text_1");
        echo "
                        </div>
                        <input type=\"hidden\" name=\"mainProduct\" id=\"mainProduct\" data-id=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["products"]) ? $context["products"] : null), "id", array()), "html", null, true);
        echo "\" data-name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["products"]) ? $context["products"] : null), "name", array()), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["products"]) ? $context["products"] : null), "price", array()), "html", null, true);
        echo "\">
                        <input type=\"hidden\" name=\"subscriptionFirst\" id=\"subscriptionFirst\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : null), "first", array()), "html", null, true);
        echo "\">
                        <input type=\"hidden\" name=\"subscriptionSecond\" id=\"subscriptionSecond\" value=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : null), "second", array()), "html", null, true);
        echo "\">

                        <div class=\"form-group\">
                            <label class=\"control-label\">Customer First Name</label>
                            <input id=\"customder_fname\" type=\"text\" required=\"required\" class=\"form-control underlined\"/>
                        </div>

                        ";
        // line 76
        if ($this->env->getExtension('extensions')->twig_setting_function("intro_text_2")) {
            // line 77
            echo "                            <div ";
            echo $this->env->getExtension('extensions')->quick_edit("setting", "intro_text_2");
            echo ">
                                ";
            // line 78
            echo $this->env->getExtension('extensions')->twig_setting_function("intro_text_2");
            echo "
                            </div>    


                            <div class=\"form-group\">
                                <label class=\"control-label\">
                                ";
            // line 84
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "taxstate", array()), 'widget', array("attr" => array("data-tax-percentage" => $this->env->getExtension('extensions')->twig_setting_function("tax_amount"))));
            echo " Massachusetts</label>
                            </div>

                        ";
        }
        // line 88
        echo "
                        <button id=\"goToPreSteps\" class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"submit\">Next</button>
                    </div>
                </div>
            </div>
            <div class=\"row setup-content\" id=\"step-2\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">
                        <div ";
        // line 96
        echo $this->env->getExtension('extensions')->quick_edit("setting", "pre_step_text_1");
        echo ">
                            ";
        // line 97
        echo $this->env->getExtension('extensions')->twig_setting_function("pre_step_text_1");
        echo "
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">CPAP</label>
                            ";
        // line 102
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cpap", array()), 'widget');
        echo "
                        </div>

                        <div ";
        // line 105
        echo $this->env->getExtension('extensions')->quick_edit("setting", "pre_step_text_2");
        echo ">
                            ";
        // line 106
        echo $this->env->getExtension('extensions')->twig_setting_function("pre_step_text_2");
        echo "
                        </div>  

                        <div class=\"form-group\">
                            <label class=\"control-label\">Comment</label>
                            ";
        // line 111
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cpapComment", array()), 'widget', array("required" => false, "attr" => array("class" => "form-control underlined", "placeholder" => "Comment")));
        echo "
                        </div>


                        <div ";
        // line 115
        echo $this->env->getExtension('extensions')->quick_edit("setting", "pre_step_text_3");
        echo ">
                            ";
        // line 116
        echo $this->env->getExtension('extensions')->twig_setting_function("pre_step_text_3");
        echo "
                        </div>  

                        <div class=\"form-group\">
                            <label class=\"control-label\"> Type </label>

                            <select class=\"form-control paymentTypes\" name=\"form[type]\">
                                <option value=\"1Pay\"> One-Time Payment </option>
                                <option value=\"3Pay\"> 3 Month Subscription </option>
                            </select>
                        </div>

                        <div ";
        // line 128
        echo $this->env->getExtension('extensions')->quick_edit("setting", "pre_step_text_3");
        echo ">
                            ";
        // line 129
        echo $this->env->getExtension('extensions')->twig_setting_function("pre_step_text_4");
        echo "
                        </div>  

                        ";
        // line 132
        $this->loadTemplate("discount-form-block.html.twig", "default/index.html.twig", 132)->display($context);
        // line 133
        echo "
                        <button id=\"goToShipping\" class=\"btn btn-primary  btn-lg pull-right\" type=\"button\" >Next</button>
                    </div>
                </div>
            </div>


            <div class=\"row setup-content\" id=\"step-3\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">
                        <h3>Extras</h3>

                        ";
        // line 145
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["extra_products"]) ? $context["extra_products"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 146
            echo "                            
                            
                           
                            <h3>";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo "</h3> 
                            
                            ";
            // line 151
            $context["id"] = ("extras_text_" . $this->getAttribute($context["loop"], "index", array()));
            // line 152
            echo "                            
                            <div ";
            // line 153
            echo $this->env->getExtension('extensions')->quick_edit("setting", (isset($context["id"]) ? $context["id"] : null));
            echo ">
                                ";
            // line 154
            echo $this->env->getExtension('extensions')->twig_setting_function((isset($context["id"]) ? $context["id"] : null), array("product_price" => $this->getAttribute($context["product"], "price", array())));
            echo "
                            </div>      

                            <div class=\"form-group\">
                                <label class=\"control-label\">Qty:</label>
                                <input id=extras_";
            // line 159
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["product"], "name", array()), 0, 7), "html", null, true);
            echo " data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
            echo "\" data-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo "\" data-price=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
            echo "\" type=\"number\" data-price=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
            echo "\" name=\"form[extras][";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
            echo "]\" value=\"0\" max=\"100\" min=\"0\" class=\"form-control extraProduct underlined\" />
                            </div>

                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 163
        echo "
                        <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\" >Next</button>

                    </div>    
                </div>          
            </div>    

            <div class=\"row setup-content\" id=\"step-4\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">

                        <div ";
        // line 174
        echo $this->env->getExtension('extensions')->quick_edit("setting", "billing_details_text_1");
        echo ">
                            ";
        // line 175
        echo $this->env->getExtension('extensions')->twig_setting_function("billing_details_text_1");
        echo "
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">And what is the zip code?</label>
                            ";
        // line 180
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "zip_code", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Billing Zip Code", "pattern" => "^[0-9]+\$")));
        echo "
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Ok, on what address do you receive your statement?</label>
                            ";
        // line 185
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "address1", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Billing Address 1")));
        echo "
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Apt or Suite?</label>
                            ";
        // line 189
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "address2", array()), 'widget', array("required" => false, "attr" => array("class" => "form-control underlined", "placeholder" => "Billing Address 2")));
        echo "
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Billing First Name</label>
                            ";
        // line 193
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "first_name", array()), 'widget', array("attr" => array("class" => "form-control underlined cnameInput", "placeholder" => "")));
        echo "
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Billing Last Name</label>
                            ";
        // line 197
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "last_name", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "")));
        echo "
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\"></label>
                            ";
        // line 201
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "city", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Billing City")));
        echo "
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Now what city/state is that?</label>
                            ";
        // line 205
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "state", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Billing State")));
        echo "
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Billing Country</label>
                            ";
        // line 210
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "country", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "")));
        echo "
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Shipping Method</label>
                            ";
        // line 214
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ship_method", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Shipping Method")));
        echo "
                        </div>
                         <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\" >Next</button> 
                    </div>
                </div>
            </div>
                        
          
            <div class=\"row setup-content\" id=\"step-5\" style=\"display: none;\">

                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">
                        <h3> General Details</h3>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Thank you! Can I get your phone number? <span class=\"text-warning\">(Required)</span></label>
                            ";
        // line 230
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Phone")));
        echo "
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Great! And your email address? <span class=\"text-warning\">(Required)</span></label>
                            ";
        // line 235
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email_address", array()), 'widget', array("required" => true, "attr" => array("class" => "form-control underlined", "placeholder" => "Email")));
        echo "
                        </div>

                        <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\">Next</button>
                    </div>
                </div>
            </div>

            <div class=\"row setup-content\" id=\"step-6\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">

                        <div ";
        // line 247
        echo $this->env->getExtension('extensions')->quick_edit("setting", "payment_details_text_0");
        echo ">
                            ";
        // line 248
        echo $this->env->getExtension('extensions')->twig_setting_function("payment_details_text_0");
        echo "
                        </div>

                        <div class=\"alert alert-success\" role=\"alert\" align=\"center\" id=\"TypeChosen\"></div>

                        <div class=\"paymentText payText1Pay\">    
                            <div ";
        // line 254
        echo $this->env->getExtension('extensions')->quick_edit("setting", "payment_details_1pay");
        echo ">
                                ";
        // line 255
        echo $this->env->getExtension('extensions')->twig_setting_function("payment_details_1pay", array("total_charge" => "<span class=\"totalCharge\">total_charge</span>"));
        // line 257
        echo "
                            </div>    
                        </div>
 
                        <div class=\"paymentText payText3Pay\"  style=\"display:none\"  >
                            <div ";
        // line 262
        echo $this->env->getExtension('extensions')->quick_edit("setting", "payment_details_3pay");
        echo ">
                                ";
        // line 263
        echo $this->env->getExtension('extensions')->twig_setting_function("payment_details_3pay", array("total_charge" => "<span class=\"totalCharge\">total_charge</span>", "first_charge" => "<span class=\"firstCharge\">first_charge</span>", "subsequent_charges" => "<span class=\"subsequentCharges\">subsequent_charges</span>"));
        // line 267
        echo "
                            </div>      
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Choosen Product</label>
                            <select class=\"form-control\" id=\"chosenProduct\" name=\"form[product]\">
                                ";
        // line 274
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 275
            echo "                                    <option ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo "selected=\"selected\" ";
            }
            echo " data-value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo " - \$";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
            echo "</option>
                                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 277
        echo "                            </select>
                        </div>
                        <div class=\"form-group col-md-12\">
                            <div ";
        // line 280
        echo $this->env->getExtension('extensions')->quick_edit("setting", "payment_details_text_2");
        echo ">
                                ";
        // line 281
        echo $this->env->getExtension('extensions')->twig_setting_function("payment_details_text_2");
        echo "
                            </div>
                        </div>


                        <!-- discounted product -->

                        <div class=\"form-group\">
                            <label class=\"control-label\">Qty</label>
                            ";
        // line 290
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "qte", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "", "data-id" => $this->getAttribute($this->getAttribute((isset($context["discounted_products"]) ? $context["discounted_products"] : null), 0, array(), "array"), "id", array()), "data-name" => $this->getAttribute($this->getAttribute((isset($context["discounted_products"]) ? $context["discounted_products"] : null), 0, array(), "array"), "name", array()), "data-price" => $this->getAttribute($this->getAttribute((isset($context["discounted_products"]) ? $context["discounted_products"] : null), 0, array(), "array"), "price", array()))));
        echo "
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Choose Discounted Product</label>
                            <select id=\"discountedProduct\" class=\"form-control\" name=\"form[discounted_product]\">
                                ";
        // line 296
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["discounted_products"]) ? $context["discounted_products"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 297
            echo "                                    <option ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo " selected=\"selected\" ";
            }
            echo " data-value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo " - \$";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
            echo "</option>
                                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 298
        echo " 
                            </select>
                        </div>

                        <!-- discounted product -->                            

                        <div class=\"form-group col-md-12\">
                            <div ";
        // line 305
        echo $this->env->getExtension('extensions')->quick_edit("setting", "payment_details_text_3");
        echo ">
                                ";
        // line 306
        echo $this->env->getExtension('extensions')->twig_setting_function("payment_details_text_3");
        echo "
                            </div>  
                        </div>

                        <div class=\"form-group\"> 
                            <label class=\"control-label\">Shipping Total</label>
                            ";
        // line 312
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "shipping_total", array()), 'widget', array("attr" => array("data-default-shipping-charge" => "0.00", "class" => "form-control underlined floatNumber", "placeholder" => "")));
        echo "
                        </div>  
 
                        <div class=\"form-group col-md-12\">
                            <div ";
        // line 316
        echo $this->env->getExtension('extensions')->quick_edit("setting", "payment_details_text_4");
        echo ">
                                ";
        // line 317
        echo $this->env->getExtension('extensions')->twig_setting_function("payment_details_text_4");
        echo "
                            </div>  
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\"></label>
                            ";
        // line 323
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "card_number", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Card Number")));
        echo "
                        </div>

                        <div class=\"form-group col-md-12\">
                            <p>Expiration date? <b class=\"text-warning\">(Repeat back)</b></p>
                        </div>

                        <div class=\"form-group col-md-3\">
                            <label class=\"control-label\">Month</label>
                            ";
        // line 332
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "card_expiration_month", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "")));
        echo "
                        </div>

                        <div class=\"form-group col-md-3\">
                            <label class=\"control-label\">Year</label>
                            ";
        // line 337
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "card_expiration_year", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "")));
        echo "
                        </div>

                        <div class=\"form-group col-md-12\">
                            <div ";
        // line 341
        echo $this->env->getExtension('extensions')->quick_edit("setting", "payment_details_text_5");
        echo ">
                                ";
        // line 342
        echo $this->env->getExtension('extensions')->twig_setting_function("payment_details_text_5");
        echo "
                            </div>  


                        </div>

                        <div class=\"form-group col-md-3\">
                            <label class=\"control-label\"></label>
                            ";
        // line 350
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "card_code", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "CVV", "pattern" => "^[0-9]{3}\$")));
        echo "
                        </div>

                        <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\" >Next</button>
                        <button id=\"validateCreditCard\" class=\"btn btn-primary-outline  pull-right\" type=\"button\">Validate Card</button>

                        <div id=\"ccInfo\"></div>
                    </div>
                </div>
            </div>
         <div class=\"row setup-content\" id=\"step-7\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">
                        <h3> Shipping Details</h3>

                        <div ";
        // line 365
        echo $this->env->getExtension('extensions')->quick_edit("setting", "shipping_text_1");
        echo ">
                            ";
        // line 366
        echo $this->env->getExtension('extensions')->twig_setting_function("shipping_text_1");
        echo "
                        </div>     
                        
                        <div class=\"form-group\">
                            <label class=\"control-label\">Great, and is the shipping address  the same as the billing address ?</label>
                            <input type=\"checkbox\" id=\"same_shipping\">
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Great! What is your zip code? <span class=\"text-warning\">(Repeat back)</span></label>
                            ";
        // line 376
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ship_to_zip_code", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Zip Code", "pattern" => "^[0-9]+\$")));
        echo "
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Okay, so that's in </label>
                            ";
        // line 380
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ship_to_state", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Shipping State")));
        echo "
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Shipping First Name</label>
                            ";
        // line 384
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ship_to_first_name", array()), 'widget', array("attr" => array("class" => "form-control underlined cnameInput", "placeholder" => "First Name")));
        echo "
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Ok,  Can I get your Last Name?<span class=\"text-warning\">(Repeat back)</span></label>
                            ";
        // line 388
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ship_to_last_name", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Last Name")));
        echo "
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">And what is your street address? <span class=\"text-warning\">(Repeat back)</span></label>
                            ";
        // line 392
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ship_to_address1", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Shipping Address 1")));
        echo "
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Apt or Suite? <span class=\"text-warning\">(Repeat back)</span></label>
                            ";
        // line 396
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ship_to_address2", array()), 'widget', array("required" => false, "attr" => array("class" => "form-control underlined", "placeholder" => "Shipping Address 2")));
        echo "
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Shipping City</label>
                            ";
        // line 400
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ship_to_city", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Shipping City")));
        echo "
                        </div>

                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Shipping Country</label>
                            ";
        // line 405
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ship_to_country", array()), 'widget', array("attr" => array("class" => "form-control underlined", "placeholder" => "Shipping Country")));
        echo "
                        </div>

                        <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\" >Next</button>
                        ";
        // line 410
        echo "                    </div>
                </div>
            </div>
            <div class=\"row setup-content\" id=\"step-8\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"card card-default\">
                        <div class=\"card-block\">
                            <div class=\"showTable1\">
                            </div>

                        </div>

                        <button class=\"btn btn-success btn-lg pull-right\" type=\"submit\">Submit</button>
                    </div>
                </div>
            </div>

        </form>

    </div>


    <link href=\"";
        // line 432
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" id=\"bootstrap-css\">


    <style>
        .app{
            padding-left: 0;
        }
        .stepwizard-step p {
            margin-top: 10px;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 50%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: \" \";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        .has-error .form-control.underlined {
            background: #fff4f4;
        }

        #ccInfo.loading {
            border:1px solid #6b6b6b;
            background: #ffef76;
            padding: 10px;
            clear: both;
        }

        #ccInfo.error {
            border: 1px solid red;
            background: #fff4f4;
            clear: both;
            padding: 10px;
        }

        #ccInfo.success {
            border: 1px solid green;
            background: #f0fdf0;
            padding: 10px;
            clear: both;
        }

        #validateCreditCard {
            margin-right: 20px;
            margin-top: 6px;
        }

    </style>


";
    }

    public function getTemplateName()
    {
        return "default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  813 => 432,  789 => 410,  782 => 405,  774 => 400,  767 => 396,  760 => 392,  753 => 388,  746 => 384,  739 => 380,  732 => 376,  719 => 366,  715 => 365,  697 => 350,  686 => 342,  682 => 341,  675 => 337,  667 => 332,  655 => 323,  646 => 317,  642 => 316,  635 => 312,  626 => 306,  622 => 305,  613 => 298,  586 => 297,  569 => 296,  560 => 290,  548 => 281,  544 => 280,  539 => 277,  512 => 275,  495 => 274,  486 => 267,  484 => 263,  480 => 262,  473 => 257,  471 => 255,  467 => 254,  458 => 248,  454 => 247,  439 => 235,  431 => 230,  412 => 214,  405 => 210,  397 => 205,  390 => 201,  383 => 197,  376 => 193,  369 => 189,  362 => 185,  354 => 180,  346 => 175,  342 => 174,  329 => 163,  301 => 159,  293 => 154,  289 => 153,  286 => 152,  284 => 151,  279 => 149,  274 => 146,  257 => 145,  243 => 133,  241 => 132,  235 => 129,  231 => 128,  216 => 116,  212 => 115,  205 => 111,  197 => 106,  193 => 105,  187 => 102,  179 => 97,  175 => 96,  165 => 88,  158 => 84,  149 => 78,  144 => 77,  142 => 76,  132 => 69,  128 => 68,  120 => 67,  115 => 65,  111 => 64,  105 => 60,  99 => 56,  95 => 55,  91 => 54,  48 => 13,  41 => 9,  37 => 7,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block content %}

    <div class=\"container\">
        {% if message %}
            <div class=\"row col-md-offset-3\">
                <div class=\"alert alert-success col-md-8\">
                    <center>{{ message| raw }}</center>
                </div>
            </div>
        {% endif %}
        <div class=\"showTable\">
        </div>

        <div class=\"stepwizard col-md-offset-3\">
            <div class=\"stepwizard-row setup-panel\">
                <div class=\"stepwizard-step\">
                    <a href=\"#step-1\" type=\"button\" class=\"btn btn-primary btn-circle\">1</a>
                    <p>Intro</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-2\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">2</a>
                    <p>Pre-Steps</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-3\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">3</a>
                    <p>Extras</p>
                </div>

                <div class=\"stepwizard-step\">
                    <a href=\"#step-4\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">4</a>
                    <p>Billing</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-5\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">5</a>
                    <p>General</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-6\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">6</a>
                    <p>Payment Details</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-7\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">7</a>
                    <p>Shipping</p>
                </div>
                <div class=\"stepwizard-step\">
                    <a href=\"#step-8\" type=\"button\" class=\"btn btn-default btn-circle\" disabled=\"disabled\">8</a>
                    <p>Final Transaction</p>
                </div>
            </div>
        </div>

        <form data-shipping-charge-threepay-additional-product=\"{{ setting('3pay_shipping_charge_additional_product') }}\"
              data-shipping-charge-rush-shipping=\"{{ setting('rush_shipping_charge_additional_product') }}\"
              data-first-payment-amount=\"{{ setting('first_payment_3pay') }}\" 
              
              id=\"mainForm\" autocomplete=\"off\" role=\"form\" method=\"post\">
{#{{ dump() }}#}
            <div class=\"row setup-content\" id=\"step-1\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">

                        <div {{ quick_edit('setting', 'intro_text_1') | raw }}>
                            {{ setting('intro_text_1') | raw }}
                        </div>
                        <input type=\"hidden\" name=\"mainProduct\" id=\"mainProduct\" data-id=\"{{ products.id }}\" data-name=\"{{ products.name }}\" value=\"{{ products.price }}\">
                        <input type=\"hidden\" name=\"subscriptionFirst\" id=\"subscriptionFirst\" value=\"{{ subscription.first }}\">
                        <input type=\"hidden\" name=\"subscriptionSecond\" id=\"subscriptionSecond\" value=\"{{ subscription.second }}\">

                        <div class=\"form-group\">
                            <label class=\"control-label\">Customer First Name</label>
                            <input id=\"customder_fname\" type=\"text\" required=\"required\" class=\"form-control underlined\"/>
                        </div>

                        {% if setting('intro_text_2') %}
                            <div {{ quick_edit('setting', 'intro_text_2') | raw }}>
                                {{ setting('intro_text_2') | raw }}
                            </div>    


                            <div class=\"form-group\">
                                <label class=\"control-label\">
                                {{ form_widget(form.taxstate, {'attr': {'data-tax-percentage': setting('tax_amount')}}) }} Massachusetts</label>
                            </div>

                        {% endif %}

                        <button id=\"goToPreSteps\" class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"submit\">Next</button>
                    </div>
                </div>
            </div>
            <div class=\"row setup-content\" id=\"step-2\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">
                        <div {{ quick_edit('setting', 'pre_step_text_1') | raw }}>
                            {{ setting('pre_step_text_1') | raw }}
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">CPAP</label>
                            {{ form_widget(form.cpap) }}
                        </div>

                        <div {{ quick_edit('setting', 'pre_step_text_2') | raw }}>
                            {{ setting('pre_step_text_2') | raw }}
                        </div>  

                        <div class=\"form-group\">
                            <label class=\"control-label\">Comment</label>
                            {{ form_widget(form.cpapComment, {'required':false,'attr': {'class': 'form-control underlined', 'placeholder': 'Comment' } }) }}
                        </div>


                        <div {{ quick_edit('setting', 'pre_step_text_3') | raw }}>
                            {{ setting('pre_step_text_3') | raw }}
                        </div>  

                        <div class=\"form-group\">
                            <label class=\"control-label\"> Type </label>

                            <select class=\"form-control paymentTypes\" name=\"form[type]\">
                                <option value=\"1Pay\"> One-Time Payment </option>
                                <option value=\"3Pay\"> 3 Month Subscription </option>
                            </select>
                        </div>

                        <div {{ quick_edit('setting', 'pre_step_text_3') | raw }}>
                            {{ setting('pre_step_text_4') | raw }}
                        </div>  

                        {% include 'discount-form-block.html.twig' %}

                        <button id=\"goToShipping\" class=\"btn btn-primary  btn-lg pull-right\" type=\"button\" >Next</button>
                    </div>
                </div>
            </div>


            <div class=\"row setup-content\" id=\"step-3\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">
                        <h3>Extras</h3>

                        {% for product in extra_products %}
                            
                            
                           
                            <h3>{{ product.name }}</h3> 
                            
                            {% set id =  'extras_text_'~loop.index  %}
                            
                            <div {{ quick_edit('setting', id) | raw }}>
                                {{ setting(id, {'product_price': product.price}) | raw }}
                            </div>      

                            <div class=\"form-group\">
                                <label class=\"control-label\">Qty:</label>
                                <input id=extras_{{ product.name|slice(0,7) }} data-id=\"{{ product.id }}\" data-name=\"{{ product.name }}\" data-price=\"{{ product.price }}\" type=\"number\" data-price=\"{{ product.price }}\" name=\"form[extras][{{ product.id }}]\" value=\"0\" max=\"100\" min=\"0\" class=\"form-control extraProduct underlined\" />
                            </div>

                        {% endfor %}

                        <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\" >Next</button>

                    </div>    
                </div>          
            </div>    

            <div class=\"row setup-content\" id=\"step-4\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">

                        <div {{ quick_edit('setting', 'billing_details_text_1') | raw }}>
                            {{ setting('billing_details_text_1') | raw }}
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">And what is the zip code?</label>
                            {{ form_widget(form.zip_code, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Billing Zip Code','pattern':'^[0-9]+\$' } }) }}
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Ok, on what address do you receive your statement?</label>
                            {{ form_widget(form.address1, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Billing Address 1' } }) }}
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Apt or Suite?</label>
                            {{ form_widget(form.address2, { 'required':false,'attr': {'class': 'form-control underlined', 'placeholder': 'Billing Address 2' } }) }}
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Billing First Name</label>
                            {{ form_widget(form.first_name, { 'attr': {'class': 'form-control underlined cnameInput', 'placeholder': '' } }) }}
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Billing Last Name</label>
                            {{ form_widget(form.last_name, { 'attr': {'class': 'form-control underlined', 'placeholder': '' } }) }}
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\"></label>
                            {{ form_widget(form.city, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Billing City' } }) }}
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Now what city/state is that?</label>
                            {{ form_widget(form.state, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Billing State' } }) }}
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Billing Country</label>
                            {{ form_widget(form.country, { 'attr': {'class': 'form-control underlined', 'placeholder': '' } }) }}
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Shipping Method</label>
                            {{ form_widget(form.ship_method, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Shipping Method' } }) }}
                        </div>
                         <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\" >Next</button> 
                    </div>
                </div>
            </div>
                        
          
            <div class=\"row setup-content\" id=\"step-5\" style=\"display: none;\">

                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">
                        <h3> General Details</h3>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Thank you! Can I get your phone number? <span class=\"text-warning\">(Required)</span></label>
                            {{ form_widget(form.phone, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Phone' } }) }}
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Great! And your email address? <span class=\"text-warning\">(Required)</span></label>
                            {{ form_widget(form.email_address, { 'required':true, 'attr': {'class': 'form-control underlined', 'placeholder': 'Email' } }) }}
                        </div>

                        <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\">Next</button>
                    </div>
                </div>
            </div>

            <div class=\"row setup-content\" id=\"step-6\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">

                        <div {{ quick_edit('setting', 'payment_details_text_0') | raw }}>
                            {{ setting('payment_details_text_0') | raw }}
                        </div>

                        <div class=\"alert alert-success\" role=\"alert\" align=\"center\" id=\"TypeChosen\"></div>

                        <div class=\"paymentText payText1Pay\">    
                            <div {{ quick_edit('setting', 'payment_details_1pay') | raw }}>
                                {{ setting('payment_details_1pay', {
                                        'total_charge': '<span class=\"totalCharge\">total_charge</span>'
                                 }) | raw }}
                            </div>    
                        </div>
 
                        <div class=\"paymentText payText3Pay\"  style=\"display:none\"  >
                            <div {{ quick_edit('setting', 'payment_details_3pay') | raw }}>
                                {{ setting('payment_details_3pay', {
                                        'total_charge': '<span class=\"totalCharge\">total_charge</span>',
                                        'first_charge': '<span class=\"firstCharge\">first_charge</span>',
                                        'subsequent_charges': '<span class=\"subsequentCharges\">subsequent_charges</span>'
                                 }) | raw }}
                            </div>      
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Choosen Product</label>
                            <select class=\"form-control\" id=\"chosenProduct\" name=\"form[product]\">
                                {% for product in products %}
                                    <option {% if loop.first %}selected=\"selected\" {% endif %} data-value=\"{{ product.price }}\" value=\"{{ product.id }}\">{{ product.name }} - \${{ product.price }}</option>
                                {% endfor %}
                            </select>
                        </div>
                        <div class=\"form-group col-md-12\">
                            <div {{ quick_edit('setting', 'payment_details_text_2') | raw }}>
                                {{ setting('payment_details_text_2') | raw }}
                            </div>
                        </div>


                        <!-- discounted product -->

                        <div class=\"form-group\">
                            <label class=\"control-label\">Qty</label>
                            {{ form_widget(form.qte, { 'attr': {'class': 'form-control underlined', 'placeholder': '', 'data-id': discounted_products[0].id, 'data-name': discounted_products[0].name, 'data-price': discounted_products[0].price } }) }}
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Choose Discounted Product</label>
                            <select id=\"discountedProduct\" class=\"form-control\" name=\"form[discounted_product]\">
                                {% for product in discounted_products %}
                                    <option {% if loop.first %} selected=\"selected\" {% endif %} data-value=\"{{ product.price }}\" value=\"{{ product.id }}\">{{ product.name }} - \${{ product.price }}</option>
                                {% endfor %} 
                            </select>
                        </div>

                        <!-- discounted product -->                            

                        <div class=\"form-group col-md-12\">
                            <div {{ quick_edit('setting', 'payment_details_text_3') | raw }}>
                                {{ setting('payment_details_text_3') | raw }}
                            </div>  
                        </div>

                        <div class=\"form-group\"> 
                            <label class=\"control-label\">Shipping Total</label>
                            {{ form_widget(form.shipping_total, {'attr': { 'data-default-shipping-charge': '0.00', 'class': 'form-control underlined floatNumber', 'placeholder': '' } }) }}
                        </div>  
 
                        <div class=\"form-group col-md-12\">
                            <div {{ quick_edit('setting', 'payment_details_text_4') | raw }}>
                                {{ setting('payment_details_text_4') | raw }}
                            </div>  
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\"></label>
                            {{ form_widget(form.card_number, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Card Number'} }) }}
                        </div>

                        <div class=\"form-group col-md-12\">
                            <p>Expiration date? <b class=\"text-warning\">(Repeat back)</b></p>
                        </div>

                        <div class=\"form-group col-md-3\">
                            <label class=\"control-label\">Month</label>
                            {{ form_widget(form.card_expiration_month, { 'attr': {'class': 'form-control underlined', 'placeholder': '' } }) }}
                        </div>

                        <div class=\"form-group col-md-3\">
                            <label class=\"control-label\">Year</label>
                            {{ form_widget(form.card_expiration_year, { 'attr': {'class': 'form-control underlined', 'placeholder': '' } }) }}
                        </div>

                        <div class=\"form-group col-md-12\">
                            <div {{ quick_edit('setting', 'payment_details_text_5') | raw }}>
                                {{ setting('payment_details_text_5') | raw }}
                            </div>  


                        </div>

                        <div class=\"form-group col-md-3\">
                            <label class=\"control-label\"></label>
                            {{ form_widget(form.card_code, { 'attr': {'class': 'form-control underlined', 'placeholder': 'CVV','pattern':'^[0-9]{3}\$' } }) }}
                        </div>

                        <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\" >Next</button>
                        <button id=\"validateCreditCard\" class=\"btn btn-primary-outline  pull-right\" type=\"button\">Validate Card</button>

                        <div id=\"ccInfo\"></div>
                    </div>
                </div>
            </div>
         <div class=\"row setup-content\" id=\"step-7\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"col-md-12 card-block\">
                        <h3> Shipping Details</h3>

                        <div {{ quick_edit('setting', 'shipping_text_1') | raw }}>
                            {{ setting('shipping_text_1') | raw }}
                        </div>     
                        
                        <div class=\"form-group\">
                            <label class=\"control-label\">Great, and is the shipping address  the same as the billing address ?</label>
                            <input type=\"checkbox\" id=\"same_shipping\">
                        </div>

                        <div class=\"form-group\">
                            <label class=\"control-label\">Great! What is your zip code? <span class=\"text-warning\">(Repeat back)</span></label>
                            {{ form_widget(form.ship_to_zip_code, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Zip Code','pattern':'^[0-9]+\$' } }) }}
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Okay, so that's in </label>
                            {{ form_widget(form.ship_to_state, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Shipping State' } }) }}
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Shipping First Name</label>
                            {{ form_widget(form.ship_to_first_name, { 'attr': {'class': 'form-control underlined cnameInput', 'placeholder': 'First Name' } }) }}
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Ok,  Can I get your Last Name?<span class=\"text-warning\">(Repeat back)</span></label>
                            {{ form_widget(form.ship_to_last_name, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Last Name' } }) }}
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">And what is your street address? <span class=\"text-warning\">(Repeat back)</span></label>
                            {{ form_widget(form.ship_to_address1, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Shipping Address 1' } }) }}
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Apt or Suite? <span class=\"text-warning\">(Repeat back)</span></label>
                            {{ form_widget(form.ship_to_address2, { 'required':false,'attr': {'class': 'form-control underlined', 'placeholder': 'Shipping Address 2' } }) }}
                        </div>
                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Shipping City</label>
                            {{ form_widget(form.ship_to_city, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Shipping City' } }) }}
                        </div>

                        <div class=\"form-group col-md-6\">
                            <label class=\"control-label\">Shipping Country</label>
                            {{ form_widget(form.ship_to_country, { 'attr': {'class': 'form-control underlined', 'placeholder': 'Shipping Country' } }) }}
                        </div>

                        <button class=\"btn btn-primary nextBtn btn-lg pull-right\" type=\"button\" >Next</button>
                        {#<button class=\"btn btn-success btn-lg pull-right\" type=\"submit\">Submit</button>#}
                    </div>
                </div>
            </div>
            <div class=\"row setup-content\" id=\"step-8\" style=\"display: none;\">
                <div class=\"col-md-6 col-md-offset-3 card sameheight-item\">
                    <div class=\"card card-default\">
                        <div class=\"card-block\">
                            <div class=\"showTable1\">
                            </div>

                        </div>

                        <button class=\"btn btn-success btn-lg pull-right\" type=\"submit\">Submit</button>
                    </div>
                </div>
            </div>

        </form>

    </div>


    <link href=\"{{ asset(\"css/bootstrap.min.css\") }}\" rel=\"stylesheet\" id=\"bootstrap-css\">


    <style>
        .app{
            padding-left: 0;
        }
        .stepwizard-step p {
            margin-top: 10px;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 50%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: \" \";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        .has-error .form-control.underlined {
            background: #fff4f4;
        }

        #ccInfo.loading {
            border:1px solid #6b6b6b;
            background: #ffef76;
            padding: 10px;
            clear: both;
        }

        #ccInfo.error {
            border: 1px solid red;
            background: #fff4f4;
            clear: both;
            padding: 10px;
        }

        #ccInfo.success {
            border: 1px solid green;
            background: #f0fdf0;
            padding: 10px;
            clear: both;
        }

        #validateCreditCard {
            margin-right: 20px;
            margin-top: 6px;
        }

    </style>


{% endblock %}";
    }
}
