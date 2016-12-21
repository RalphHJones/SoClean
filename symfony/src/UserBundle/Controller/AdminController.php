<?php

namespace UserBundle\Controller;

use DateInterval;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller {

    public function indexAction(Request $request) {
        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request) {
        $repository = $this->getDoctrine()->getRepository('UserBundle:User');
        $users = $repository->findAll();
        return $this->render('admin/index.html.twig', array('users' => $users));
    }

    /**
     * @Route("/admin/transactions/{page}", name="see_transactions", requirements={"page": "\d+"})
     */
    public function seeTransactionAction(Request $request, $page = 1) {
        $choices = array();
        $choices["yesterday"] = "0";
        #$choices["This week"]="1";
        $choices["Last week"] = "2";
        $choices["Last two weeks"] = "3";
        $choices["Last month"] = "4";
        $choices["Last two months"] = "5";
        $choices["Last Six months"] = "6";
        $choices["Last Year"] = "7";
        $form = $this->createFormBuilder()
                ->add('period', ChoiceType::class, array('choices' => $choices))
                ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $qb = $em->getRepository('UserBundle:Orders')->createQueryBuilder('a');
            if ($data["period"] == "1") {
                $date = new DateTime(date("Ymd"));
                $date->add(new DateInterval('P' . date("N") . 'D'));
            } elseif ($data["period"] == "2") {
                $date = new DateTime(date("Ymd"));
                $date->sub(new DateInterval('P7D'));
            } elseif ($data["period"] == "3") {
                $date = new DateTime(date("Ymd"));
                $date->sub(new DateInterval('P14D'));
            } elseif ($data["period"] == "4") {
                $date = new DateTime(date("Ymd"));
                $date->sub(new DateInterval('P1M'));
            } elseif ($data["period"] == "5") {
                $date = new DateTime(date("Ymd"));
                $date->sub(new DateInterval('P2M'));
            } elseif ($data["period"] == "6") {
                $date = new DateTime(date("Ymd"));
                $date->sub(new DateInterval('P6M'));
            } elseif ($data["period"] == "7") {
                $date = new DateTime(date("Ymd"));
                $date->sub(new DateInterval('P1Y'));
            } else {
                $date = new DateTime(date("Ymd"));
                $date->sub(new DateInterval('P1D'));
            }
            $qb->where("a.orderdate >= :m")->setParameter('m', $date->format("Y-m-d"))->orderBy('a.orderdate', 'DESC');
            $iterableResult = $qb->getQuery()->iterate();
            $handle = fopen('php://memory', 'r+');
            $header = array();
            fputcsv($handle, ["Order ID", 'Authorize ID', "Agent ID", "ORDER STATUS", "Order Date", "Order Time", 'Type', 'Country', "Shipping - First Name", "Shipping - Last Name", "Shipping - Address", "Shipping - Address2", "Shipping - City", "Shipping - State", "Shipping - Zip", "Billing - First Name", "Billing - Last Name", "Billing - Address", "Billing - Address2", "Billing - City", "Billing - State", "Billing - Zip", 'Phone', 'Email', 'ProductTotal', "Shipping - Method", "SH Total", "Tax Total", "Order Total", 'SKU', "Sku Qty", "Sku Price", "Sku SH", "Sku Description"]);
            while (false !== ($row = $iterableResult->next())) {
                $OrdersRepository = $this->getDoctrine()->getRepository('UserBundle:Orderdetails');
                foreach ($OrdersRepository->findBy(array('order' => $row[0]->getId())) as $order) {
                    fputcsv($handle, $order->getData());
                }

                $em->detach($row[0]);
            }

            rewind($handle);
            $content = stream_get_contents($handle);
            fclose($handle);
            
            $date = new DateTime();
          
            
            $filename = 'orders-' .$date->format('Y-m-d-H:i:s') .'.csv';

            return new Response($content, 200, array(
                'Content-Type' => 'application/force-download',
                'Content-Disposition' => 'attachment; filename="'.$filename.'"'
            ));
        }

        $repository = $this->getDoctrine()->getRepository('UserBundle:Orders');

        $query = $repository->createQueryBuilder('o')
                ->orderBy('o.id', 'DESC')
                ->getQuery();



        $transactions = $this->get('knp_paginator')->paginate($query->getResult(), $page, 20);


        return $this->render('admin/see_transactions.html.twig', array('form' => $form->createView(), 'transactions' => $transactions));
    }

    /**
     * @Route("/admin/{id}/update", name="user_update")
     */
    public function updateAction($id, Request $request) {

        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->findUserBy(array('id' => $id));
        if (!$user) {
            throw $this->createNotFoundException('Unable to find this user.');
        }
        //$user->setEnabled(true);


        $builder = $this->createFormBuilder($user)
                ->add('username')
                ->add('email')
                ->add('plainPassword', PasswordType::class, array('required' => false))
                ->add('enabled', CheckboxType::class, array('required' => false));
        $form = $builder
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userManager->updateUser($user);


            return $this->render('admin/update_user.html.twig', array(
                        'form' => $form->createView(), 'success' => "User created successfully", "id" => $id
            ));
        }

        return $this->render('admin/update_user.html.twig', array(
                    'form' => $form->createView(), 'success' => null, "id" => $id
        ));
    }

    /**
     * @Route("/admin/{id}/delete", name="user_delete")
     */
    public function deleteAction($id, Request $request) {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id' => $id));
        $user->setEnabled(!$user->isEnabled());
        $userManager->updateUser($user);
        return new Response($user->isEnabled() ? "Active" : "Inactive");
    }

}