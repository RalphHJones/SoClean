<?php

namespace Website\PublicBundle\Controller;

use Website\AdminBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller {

    public function deleteOrderdetailAction($id) {
        $repository = $this->getDoctrine()->getRepository('UserBundle:Orderdetails');
        $orderdetail = $repository->find($id);

        $em = $this->getEntityManager();

        if ($orderdetail) {
            $order = $orderdetail->getOrder();

            $em->remove($orderdetail);
            $em->flush();

            $return = $this->updateOrderTotals($order);

            return new JsonResponse($this->getExtraData($return, $order));
        }
    }

    public function updateOrderdetailAction($id) {
        $request = Request::createFromGlobals();

        $repository = $this->getDoctrine()->getRepository('UserBundle:Orderdetails');
        $orderdetail = $repository->find($id);

        $em = $this->getEntityManager();

        if ($orderdetail) {
            $order = $orderdetail->getOrder();

            $quantity = intval($request->request->get('quantity'));

            $orderdetail->setQty($quantity);
            $orderdetail->setShipping($this->format($request->request->get('shipping')));

            $this->setOrderdetailTax($order, $orderdetail, $orderdetail->getPrice(), $quantity);

            $em->flush();

            $return = $this->updateOrderTotals($order);

            $return['totalitem'] = $this->format($quantity * $orderdetail->getPrice());
            $return['shippingitem'] = $orderdetail->getShipping();
            $return['quantityitem'] = $quantity;
            
            return new JsonResponse($this->getExtraData($return, $order));
        }
    }

    public function getExtraData($return, $order) {
        if ($order->getType() === '3Pay') {
            $charges = $order->getPayAmount($this->getSetting('first_payment_3pay'));
            $return['firstcharge'] = $charges[0];
            $return['subsequentcharges'] = $charges[1];
        }
        return $return;
    }

}
