<?php

namespace Website\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController,
    Symfony\Component\DependencyInjection\ContainerInterface,
    Symfony\Component\HttpFoundation\Response;
use Website\CommonBundle\Templating\Helper\Title as TitleHelper;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;

abstract class Controller extends BaseController {

    private $settings = [];
    public $scope = null;

    private function _init() {
        $this->template = $this->get('twig');

        $entities = $this->getEntityManager()->getRepository('WebsiteCommonBundle:Setting')->findAll();
        foreach ($entities as $entity) {
            if ($entity->getType() == 'integer') {
                $value = (int) $entity->getValue();
            } elseif ($entity->getType() == 'float') {
                $value = number_format((float) $entity->getValue(), 2, '.', '');
            } else {
                $value = $entity->getValue();
            }

            $this->settings[$entity->getKey()] = $value;
        }


        if ($this->scope === 'admin') {
            $this->adminInit();
        }


        if ($this->scope === 'public') {
            $this->publicInit();
        }
    }

    public function getSetting($key) {
        if (isset($this->settings[$key])) {
            return $this->settings[$key];
        } else {
            echo('Configuration missing <b>' . $key . '</b>. Please contact the developer to add this configuration.');
        }
    }

    public function getUrl($route, $parameters = [], $absolute = false) {
        if ($absolute) {
            $absolute = \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL;
        }
        return $this->generateUrl($route, $parameters, $absolute);
    }

    public function setContainer(ContainerInterface $container = null) {
        parent::setContainer($container);
        $this->_init();
    }

    public function paginate($result, $page, $itemsPerPage = 10) {
        return $this->get('knp_paginator')->paginate($result, $page, $itemsPerPage);
    }

    public function getEntityManager() {
        return $this->getDoctrine()->getManager();
    }

    protected function addTitle() {
        $args = func_get_args();
        return call_user_func_array(array(TitleHelper::getInstance(), 'add'), $args);
    }

    public function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', HiddenType::class)
                        ->getForm()
        ;
    }

    function format($amount) {
        return number_format((float) $amount, 2, '.', '');
    }

    ///////////
    // ORDER STUFF
    //////////
    public function setOrderdetailTax($order, $orderDetails, $price, $quantity) {
        $taxAmount = 0;
        if ($order->getTaxstate()) {
            $taxAmount = $price * $this->getSetting('tax_amount') * $quantity;
        }
        $orderDetails->setTax($taxAmount);

        return $taxAmount;
    }

    public function updateOrderTotals($order) {
        $repository = $this->getDoctrine()->getRepository('UserBundle:Orderdetails');
        $orderdetails = $repository->findBy(['order' => $order->getId()]);

        $subtotal = 0;
        $tax = 0;
        $shipping = 0;

        foreach ($orderdetails as $orderDetail) {
            $subtotal += $orderDetail->getPrice() * $orderDetail->getQty();
            $tax += $orderDetail->getTax();
            $shipping += $orderDetail->getShipping();
        }

        $total = $subtotal + $tax + $shipping;

        if ($total > 0) {
            if ($order->getIsdiscount() and $this->getSetting('discount_amount_' . $order->getIsdiscount())) {
                $total -= $this->getSetting('discount_amount_' . $order->getIsdiscount());
            }
        } else {
            $total = 0;
        }

        $em = $this->getEntityManager();

        // save the new data 
        $order->setOrdertotal($total);
        $order->setTaxtotal($tax);
        $order->setShippingtotal($shipping);

        $em->persist($order);
        $em->flush($order);

        return array('subtotal' => $this->format($subtotal), 'tax' => $this->format($tax), 'shipping' => $this->format($shipping), 'total' => $this->format($total));
    }

    public function getDiscountedProductShippingTax($order, $product, $shippingTax, $quantity) {
        if ($product->getIsdiscount() && !$shippingTax) { 
            if ($order->getShippingmethod() === 'rush') {
                return $this->getSetting('rush_shipping_charge_additional_product') * $quantity; // 29
            }

            if ($order->getType() === '3Pay') {
                return $this->getSetting('3pay_shipping_charge_additional_product') * $quantity; // 19.95
            }
        }
        
        return $shippingTax;
    }

    public function addProductToOrder($order, $productId, $shippingTax, $quantity = 1) {
        $em = $this->getDoctrine()->getManager();

        if ($quantity > 0) {
            $product = $this->getDoctrine()->getRepository('UserBundle:Product')->find($productId);

            $shippingTax = $this->getDiscountedProductShippingTax($order, $product, $shippingTax, $quantity);

            // new order entity
            $orderDetails = new \UserBundle\Entity\Orderdetails();
            $orderDetails->setOrder($order);
            $orderDetails->setPrice($product->getPrice());
            $orderDetails->setProduct($product);
            $orderDetails->setShipping($shippingTax);
            $orderDetails->setQty($quantity);

            $this->setOrderdetailTax($order, $orderDetails, $orderDetails->getPrice(), $quantity);
            $em->persist($orderDetails);
        }

        $em->persist($order);
        $em->flush();

        $this->updateOrderTotals($order);
    }

}
