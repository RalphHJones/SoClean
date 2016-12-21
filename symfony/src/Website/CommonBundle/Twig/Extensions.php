<?php

namespace Website\CommonBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Website\CommonBundle\Templating\Helper\Title as TitleHelper;

class Extensions extends \Twig_Extension {

    private $em;
    private $container;
    public $settings = [];

    public function __construct(\Doctrine\ORM\EntityManager $em, ContainerInterface $container) {
        $this->em = $em;
        $this->container = $container;
        $settings = $this->em->getRepository('WebsiteCommonBundle:Setting')->findAll();
        foreach ($settings as $entity) {
            $this->settings[$entity->getKey()] = $entity->getValue();
        }
    }

    public function setController(array $controller) {
        $this->controller = $controller;
    }

    public function getName() {
        return 'extensions';
    }

    public function twig_title_function() {
        return (string) TitleHelper::getInstance();
    }

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('trunc', array($this, 'twig_truncate_filter'), array('needs_environment' => true)),
        );
    }

    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('title', array($this, 'twig_title_function')),
            new \Twig_SimpleFunction('setting', array($this, 'twig_setting_function')),
            new \Twig_SimpleFunction('part_of_day', array($this, 'getPartOfDay')),
            new \Twig_SimpleFunction('quick_edit', array($this, 'quick_edit')),
            new \Twig_SimpleFunction('order_total', array($this, 'order_total')),
        );
    }

    public function getPartOfDay() {
        $hour = date('G');

        if ($hour >= 5 && $hour <= 11) {
            return 'Morning';
        } else if ($hour >= 12 && $hour <= 18) {
            return 'Afternoon';
        } else if ($hour >= 19 || $hour <= 4) {
            return 'Evening';
        }
    }

    public function quick_edit($type, $id = null) {
        $isAdmin = $this->container->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN');
        if ($isAdmin) {
            $router = $this->container->get('router');

            $absolute = \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL;


            $setting = $this->em->getRepository('WebsiteCommonBundle:Setting')->findOneEntityByKey($id);

            if ($setting) {
                $url = $router->generate('admin_setting_edit', ['id' => $setting->getId()], $absolute);
                return " data-edit-url='$url' ";
            }
        }
    }

    public function render_view_from_settings($key, $params = []) {
        $twig = new \Twig_Environment(new \Twig_Loader_String());
        $template = $this->em->getRepository('WebsiteCommonBundle:Setting')->findOneEntityByKey($key);

        $content = $twig->render($template->getValue(), $params);

        return $content;
    }

    public function twig_truncate_filter(\Twig_Environment $env, $value, $length = 140, $preserve = true, $striptags = true) {

        if ($striptags) {
            $value = preg_replace('~<div class="quote"(.*?)</div>~Usi', "", $value);
            $value = preg_replace('/<figure[^>]*>([\s\S]*?)<\/figure[^>]*>/', '', $value);

            $value = strip_tags($value);
        }


        if (mb_strlen($value, $env->getCharset()) > $length) {
            if ($preserve) {
                if (false !== ($breakpoint = mb_strpos($value, ' ', $length, $env->getCharset()))) {
                    $length = $breakpoint;
                }
            }

            $value = mb_substr($value, 0, $length, $env->getCharset()) . '...';
        }

        return $value;
    }

    public function twig_setting_function($key, $params = []) {

        if (isset($this->settings[$key])) {

            $content = $this->settings[$key];

            if (strpos($content, 'customer_first_name') !== false) {
                $content = str_replace('customer_first_name', '<b class="cname text-primary">customer_first_name</b>', $content);
            }


            if ($params) {
                foreach ($params as $paramKey => $paramValue) {
                    $content = str_replace($paramKey, $paramValue, $content);
                }
            }


            $content = str_replace('operator_first_name', $this->container->get('security.token_storage')->getToken()->getUser()->getUsername(), $content);
            $content = str_replace('part_of_the_day', $this->getPartOfDay(), $content);

            return $content;
        }
    }

}
