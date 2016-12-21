<?php

namespace UserBundle\Controller;

use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Range;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Symfony\Component\Validator\Constraints\Time;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;

class PaymentController extends \Website\CommonBundle\Controller\Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function prepareAction(Request $request) {
        $toShow = "";
        $form = $this->createPurchasePlusCreditCardForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $data = $form->getData();
var_dump($form->getData());
            //Shipping Information
            $ship_to_firstName = $data['ship_to_first_name'];
            $ship_to_lastName = $data['ship_to_last_name'];
            $ship_to_city = $data['ship_to_city'];
            $ship_to_state = $data['ship_to_state'];
            $ship_to_zipCode = $data['ship_to_zip_code'];

            // Billing information
            $firstName = $data['first_name'];
            $lastName = $data['last_name'];
            $address = $data['address1'] . ", " . $data['address2'];
            $city = $data['city'];
            $state = $data['state'];
            $zipCode = $data['zip_code'];
            $country = $data['country'];
            $phone = $data['phone'];


            // more info
            $cpap = $data['cpap'];
            $cpapComment = $data['cpapComment'];

            $customer_email = $data['email_address'];

            $order = new \UserBundle\Entity\Orders();
            $order->setcard_num($data['card_number']);
            $order->setcard_exp_date($data['card_expiration_month'] . '-' . $data['card_expiration_year']);
            $order->setcard_code($data['card_code']);
            $order->setShippingfirstname($ship_to_firstName);
            $order->setShippinglastname($ship_to_lastName);
            $order->setShippingcity($ship_to_city);
            $order->setShippingaddress1($data['ship_to_address1']);
            $order->setShippingaddress2($data['ship_to_address2']);
            $order->setShippingstate($ship_to_state);
            $order->setShippingzip($ship_to_zipCode);
            $order->setShippingmethod($data["ship_method"]);

            $order->setBillingfirstname($firstName);
            $order->setBillinglastname($lastName);
            $order->setBillingcity($city);
            $order->setBillingaddress1($data['address1']);
            $order->setBillingaddress2($data['address2']);
            $order->setBillingstate($state);
            $order->setBillingzip($zipCode);
            $order->setCountry($country);
            $order->setEmail($customer_email);
            $order->setOrderdate(new \DateTime("now"));
            $order->setOrdertime(new \DateTime("now"));
            $order->setPhone($phone);

            $user = $this->getUser();
            $order->setUser($user);
            $order->setTaxstate($data['taxstate']);
            $order->setType($data["type"]);

            $discount = false;
            if ($data["isdiscount"] && $data["type"] == '1Pay') {
                $discount = true;
            }

            // Shipping total is being set when Main product is added, just below
            $order->setShippingtotal(0);
            $order->setIsdiscount($discount);
            $order->setCpap($cpap);
            $order->setCpapComment($cpapComment);

            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            $ProductRepository = $this->getDoctrine()->getRepository('UserBundle:Product');
           // var_dump($data);
            $Product = $ProductRepository->find($data["product"]);


            // If there are discounted products, they must be calculated separately
            $shippingTotal = $data['shipping_total'];
            if ($data["qte"] > 0 && isset($data['discounted_product'])) {
                $discountedProduct = $this->getDoctrine()->getRepository('UserBundle:Product')->find($data["discounted_product"]);
                $discountedProductsShippingTax = $this->getDiscountedProductShippingTax($order, $discountedProduct, 0, $data["qte"]);
                $shippingTotal -= $discountedProductsShippingTax;
            }

            // Add Main product

            $this->addProductToOrder($order, $Product->getId(), $shippingTotal, 1);

            // for extra products
            if (isset($data["extras"]) && !empty($data["extras"])) {
                foreach ($data["extras"] as $productId => $quantity) {
                    if ($productId && $quantity) {
                        $this->addProductToOrder($order, $productId, 0, $quantity);
                    }
                }
            }

            // for discounted products
            if ($data["qte"] > 0 && isset($data['discounted_product'])) {
                $this->addProductToOrder($order, $data['discounted_product'], 0, $data["qte"]);
            }

            return $this->redirectToRoute('summary', array('id' => $order->getId()));
        }

        $repository = $this->getDoctrine()->getRepository('UserBundle:Product');

        $products = $repository->findBy(['isdiscount' => 0, 'isextra' => 0]);
        $discounted_products = $repository->findBy(['isdiscount' => 1]);
        $extra_products = $repository->findBy(['isextra' => 1]);
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p 
             FROM UserBundle:Product p
             WHERE p.name = :name'
            )->setParameter('name', 'SoClean Refurb');
        $refurb = $query->setMaxResults(1)->getOneOrNullResult();
/*        $query = $em->createQuery("SELECT * FROM Product WHERE name=:name"
        )->setParameter('name', 'SoClean Refurb');
        $refurb = $query->setMaxResults(1)->getOneOrNullResult();
*/
        return $this->render('default/index.html.twig', array(
                    'form' => $form->createView(),
                    "message" => $toShow,
                    'products' => $products,
                    'discounted_products' => $discounted_products,
                    'extra_products' => $extra_products,
                    'subscription' => [
                        'first' => 95.99,
                        'second' => 95.99
                    ],
                    'refurb' => $refurb,
        ));
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    protected function createPurchasePlusCreditCardForm() {
        $years = array();
        foreach (range(16, 22) as $n) {
            $years[$n] = $n;
        }
        $months = array();
        foreach (range(1, 12) as $n) {
            $months[$n] = $n;
        }
        return $this->createFormBuilder()
                        ->add('taxstate', CheckboxType::class, array('required' => false))
                        ->add('card_number', null)
                        ->add('card_expiration_year', ChoiceType::class, array('choices' => $years))
                        ->add('card_expiration_month', ChoiceType::class, array('choices' => $months))
                        ->add('card_code', null)
                        ->add('email_address', null)
                        ->add('phone', null)
                        ->add('first_name', null)
                        ->add('last_name', null)
                        ->add('country', null)
                        ->add('state', null)
                        ->add('city', null)
                        ->add('address1', null)
                        ->add('address2', null)
                        ->add('zip_code', null)
                        ->add('ship_to_address1', null)
                        ->add('ship_to_address2', null)
                        ->add('ship_to_city', null)
                        ->add('ship_to_country', null)
                        ->add('ship_to_first_name', null)
                        ->add('ship_to_last_name', null)
                        ->add('ship_to_state', null)
                        ->add('ship_to_zip_code', null)
                        ->add('ship_method', ChoiceType::class, [
                            'choices' => [
                                'Free Shipping' => '1Pay',
                                '3Pay $' . $this->getSetting('3pay_shipping_charge') => '3Pay',
                                'Rush Shipping $' . $this->getSetting('rush_shipping_charge') => 'rush',
                            ],
                            'choice_attr' => function($val, $key, $index) {
                        $value = 0;
                        if ($val === '3Pay') {
                            $value = $this->getSetting('3pay_shipping_charge');
                        }
                        if ($val === 'rush') {
                            $value = $this->getSetting('rush_shipping_charge');
                        }
                        return ['data-value' => $value];
                    },]
                        )
                        ->add('type', null)
                        ->add('product', null)
                        ->add('discounted_product', null)
                        ->add('extras', null)
                        ->add('qte', IntegerType::class, array('data' => 0, 'attr' => array('max' => '3', 'min' => '0')))
                        ->add('isdiscount', HiddenType::class, array('data' => 0, 'required' => false))
                        ->add('shipping_total', NumberType::class, array('data' => 0, 'attr' => array('step' => '0.01')))
                        ->add('cpapComment', null)
                        ->add('cpap', ChoiceType::class, [
                            'choices' => [
                                'Resmed ' => [
                                    'S8' => 'S8',
                                    'S9' => 'S9',
                                    'AirSense 10' => 'AirSense 10'
                                ],
                                'Respironics' => [
                                    'DreamStation' => 'DreamStation',
                                    'System One' => 'System One',
                                ],
                                'Fisher & Paykel 600 and Icon' => 'Fisher & Paykel 600 and Icon',
                                'Trancend/Z1' => 'Trancend/Z1',
                                'Unsure' => 'Unsure',
                            ]]
                        )
                        ->getForm()
        ;
    }

    public function createAddProductForm($order = null) {
        return $this->createFormBuilder()
                        ->add('type', null)
                        ->add('product', null)
                        ->add('qte', IntegerType::class, array('data' => 1))
                        ->add('isdiscount', HiddenType::class, array('data' => $order->getIsdiscount(), 'required' => false))
                        ->add('shipping_total', NumberType::class, array('data' => 0, 'attr' => array('step' => '0.01')))
                        ->getForm()
        ;
    }

    /**
     * @Route("/addproduct/{id}", name="addproduct")
     */
    public function addProductAction($id, Request $request) {
        $OrdersRepository = $this->getDoctrine()->getRepository('UserBundle:Orders');
        $Orders = $OrdersRepository->find($id);

        $form = $this->createAddProductForm($Orders);
        $form->handleRequest($request);

        if (!$Orders or ( $Orders->getUser() != $this->getUser() && !$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN') )) {
            return $this->redirectToRoute('homepage');
        }
        if ($form->isSubmitted()) {
            $data = $form->getData();

            $em = $this->getDoctrine()->getManager();

            // update only these 2 fiels
            $Orders->setType($data["type"]);
            $Orders->setIsdiscount($data['isdiscount']);

            $em->persist($Orders);
            $em->flush();

            $this->addProductToOrder($Orders, $data["product"], $data['shipping_total'], $data["qte"]);

            return $this->redirectToRoute('summary', array('id' => $Orders->getId()));
        }
        $repository = $this->getDoctrine()->getRepository('UserBundle:Product');
        $products = $repository->findAll();

        return $this->render('default/add_product.html.twig', array(
                    'form' => $form->createView(), 'products' => $products, 'order' => $Orders
        ));
    }

    /**
     * @Route("/done", name="done")
     */
    public function doneAction() {
        return $this->render('default/done.html.twig');
    }

    /**
     * @Route("/search-location/{code}", name="search_location")
     */
    public function searchLocationAction($code) {
        $file = $this->get('kernel')->getRootDir() . '/Resources/bin/US_POSTAL_CODES.bin';
        $locations = unserialize(file_get_contents($file));

        $return = [];

        if (isset($locations[$code])) {
            $return = $locations[$code];
            $return['country'] = 'United States';
        }

        return new JsonResponse($return);
    }

    /**
     * @Route("/validate-email/{email}", name="validate_email")
     */
    public function validateEmailAction($email) {
        $validator = $this->container->get('validator');

        $return = ['success' => true];

        $constraints = array(
            new EmailConstraint([
                'message' => 'This is not a valid email address',
                'checkMX' => true,
                'checkHost' => true
                    ]),
        );

        $errors = $validator->validate($email, $constraints);

        if (count($errors) > 0) {
            $string = null;
            foreach ($errors as $error) {
                $string.= $error->getMessage();
            }

            $return['message'] = $string;
            $return['success'] = false;
        }

        return new JsonResponse($return);
    }

}
