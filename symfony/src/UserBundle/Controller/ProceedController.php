<?php

namespace UserBundle\Controller;

use DateTime;
use net\authorize\api\contract\v1\ARBCreateSubscriptionRequest;
use net\authorize\api\contract\v1\ARBSubscriptionType;
use net\authorize\api\contract\v1\CreateTransactionRequest;
use net\authorize\api\contract\v1\CreditCardType;
use net\authorize\api\contract\v1\CustomerAddressType;
use net\authorize\api\contract\v1\CustomerDataType;
use net\authorize\api\contract\v1\CustomerType;
use net\authorize\api\contract\v1\ExtendedAmountType;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use net\authorize\api\contract\v1\NameAndAddressType;
use net\authorize\api\contract\v1\PaymentScheduleType\IntervalAType;
use net\authorize\api\contract\v1\PaymentScheduleType;
use net\authorize\api\contract\v1\PaymentType;
use net\authorize\api\contract\v1\TransactionRequestType;
use net\authorize\api\controller\ARBCreateSubscriptionController;
use net\authorize\api\controller\CreateTransactionController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Time;
use UserBundle\Entity\Orders;


class ProceedController extends \Website\CommonBundle\Controller\Controller {

    public function getMode() {
//        if (in_array($this->get('kernel')->getEnvironment(), array('test', 'dev'))) {
            return \net\authorize\api\constants\ANetEnvironment::SANDBOX;
//        } else {
//            return \net\authorize\api\constants\ANetEnvironment::PRODUCTION;
//        }
    }

    /**
     * @Route("/summary/{id}", name="summary")
     */
    public function summaryAction($id, Request $request) {
        $OrdersRepository = $this->getDoctrine()->getRepository('UserBundle:Orders');
        $Orders = $OrdersRepository->find($id);
        if (!$Orders or $Orders->getUser() != $this->getUser() and ! $this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            return $this->redirectToRoute('homepage');
        }

        $form = $this->createFormBuilder()->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            return $this->sendDataToAuthorize($Orders);
        }

        $OrdersDetailsRepository = $this->getDoctrine()->getRepository('UserBundle:Orderdetails');
        $OrdersDetails = $OrdersDetailsRepository->findBy(array("order" => $Orders->getId()));


        return $this->render('default/summary.html.twig', array(
                    'form' => $form->createView(), 'order' => $Orders, "details" => $OrdersDetails,
        ));
    }

    public function sendDataToAuthorize(Orders $order) {
        $toShow = "";
        $messagesText = null;


        ## API INFO
        ## http://developer.authorize.net/hello_world/testing_guide/
        ## https://github.com/AuthorizeNet/sdk-php
        // Common setup for API credentials
        $merchantAuthentication = new MerchantAuthenticationType();
        $merchantAuthentication->setName($this->getSetting('authorizenet_id'));
        $merchantAuthentication->setTransactionKey($this->getSetting('authorizenet_key'));


        $creditCard = new CreditCardType();
        $creditCard->setCardNumber(preg_replace('/\s+/', '', $order->getcard_num()));
        $creditCard->setExpirationDate($order->getcard_exp_date());
        $creditCard->setCardCode($order->getcard_code());

        $paymentOne = new PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Tax info
        $tax = new ExtendedAmountType();
        $tax->setName("Tax");

        $refId = 'ref-1-pay-' . $order->getId();
       
        $payAmount = $order->getPayAmount($this->getSetting('first_payment_3pay'));

        $tax->setAmount($order->getTaxtotal());
        #$tax->setDescription("Tax Description here");
        //Shipping Information
        $ship_to_firstName = $order->getShippingfirstname();
        $ship_to_lastName = $order->getShippinglastname();
        $ship_to_address = $order->getShippingaddress1() . ", " . $order->getShippingaddress2();
        $ship_to_city = $order->getShippingcity();
        $ship_to_state = $order->getShippingstate();
        $ship_to_zipCode = $order->getShippingzip();
        $ship_to_country = $order->getCountry();

        $shipto = new NameAndAddressType();
        $shipto->setFirstName($ship_to_firstName);
        $shipto->setLastName($ship_to_lastName);
        $shipto->setAddress($ship_to_address);
        $shipto->setCity($ship_to_city);
        $shipto->setState($ship_to_state);
        $shipto->setZip($ship_to_zipCode);
        $shipto->setCountry($ship_to_country);
        

        // Billing information
        $firstName = $order->getBillingfirstname();
        $lastName = $order->getBillinglastname();
        $address = $order->getBillingaddress1() . ", " . $order->getBillingaddress2();
        $city = $order->getBillingcity();
        $state = $order->getBillingstate();
        $zipCode = $order->getBillingzip();
        $country = $order->getCountry();
        $phone = $order->getPhone();
        $customer_email = $order->getEmail();

        $billto = new CustomerAddressType();
        $billto->setFirstName($firstName);
        $billto->setLastName($lastName);
        $billto->setAddress($address);
        $billto->setCity($city);
        $billto->setState($state);
        $billto->setZip($zipCode);
        $billto->setCountry($country);

        // 1pay
        $success = false;

        //  $billto->setPhoneNumber($phone);
        // Customer information

        $customer = new CustomerDataType();
        $customer->setEmail($customer_email);
        //$customer->setPhoneNumber($phone);
        //create a transaction
        $transactionRequestType = new TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($payAmount[0]);
        $transactionRequestType->setPayment($paymentOne);
        #$transactionRequestType->setOrder($order);
        $transactionRequestType->setTax($tax);
        #$transactionRequestType->setPoNumber($ponumber);
        $transactionRequestType->setCurrencyCode("USD");
        $transactionRequestType->setBillTo($billto);
        $transactionRequestType->setShipTo($shipto);

        $request = new CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new CreateTransactionController($request);
        $response = $controller->executeWithApiResponse($this->getMode());

        if ($response != null) {
            $tresponse = $response->getTransactionResponse();

            if (($tresponse != null) && ($tresponse->getResponseCode() == "1")) {
                $success = true;
                $toShow.= " AUTH CODE : " . $tresponse->getAuthCode() . "<br />";
                $toShow.= " TRANS ID  : " . $tresponse->getTransId() . "<br />";
                $order->setIsdone(true);
                $em = $this->getDoctrine()->getManager();

                $order->setTransactionId($tresponse->getTransId());

                $em->persist($order);
                $em->flush();
            } else {
                foreach ($tresponse->getErrors() as $error) {
                    $messagesText .= $error->getErrorText() . ' ';
                }
                $toShow.= "ERROR: Invalid response (" . $tresponse->getResponseCode() . ") <br /> <br /> " . $messagesText . "<br />";
            }
        } else {
            $toShow.= "Charge Credit card Null response returned";
        }

        // 3pay
        if ($order->getType() == '3Pay' and $payAmount[1] && $payAmount[1] !== '0.00') {
            $refId = 'ref-3-pay-' . $order->getId();
            $customer = new CustomerType();
            $customer->setEmail($customer_email);
            $customer->setPhoneNumber($phone);


            $subscription = new ARBSubscriptionType();
            $subscription->setName($refId . " Subscription");

            $interval = new IntervalAType();
            $interval->setLength(30);
            $interval->setUnit("days");

            $recurringChargeDate = new DateTime();
            $recurringChargeDate->modify('+30 day');

            $paymentSchedule = new PaymentScheduleType();
            $paymentSchedule->setInterval($interval);
            $paymentSchedule->setStartDate($recurringChargeDate);
            $paymentSchedule->setTotalOccurrences("2");
            $paymentSchedule->setTrialOccurrences("0");

            $subscription->setPaymentSchedule($paymentSchedule);

            $subscription->setAmount($payAmount[1]);
            $subscription->setTrialAmount("0.00");

            $subscription->setPayment($paymentOne);

            $subscription->setBillTo($billto);
            $subscription->setShipTo($shipto);
            $subscription->setCustomer($customer);

            $request = new ARBCreateSubscriptionRequest();
            $request->setmerchantAuthentication($merchantAuthentication);
            $request->setRefId($refId);
            $request->setSubscription($subscription);
            $controller = new ARBCreateSubscriptionController($request);
            $response = $controller->executeWithApiResponse($this->getMode());

            if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
                $success = true;
                $toShow.="SUCCESS: Subscription ID : " . $response->getSubscriptionId() . "<br />";
                // if first order is not ok, else keep 'true' 
                if (!$order->getIsdone()) {
                    $order->setIsdone(false);
                }

                $order->setTransactionId($order->getTransactionId() . ', ' . $response->getSubscriptionId());

                $em = $this->getDoctrine()->getManager();
                $em->persist($order);
                $em->flush();
            } else {
                $toShow.= "ERROR :  Invalid response<br>";
                $errorMessages = $response->getMessages()->getMessage();
                $toShow.= "Response : " . $errorMessages[0]->getCode() . "  " . $errorMessages[0]->getText() . "<br>";
            }
        }


        return $this->render('default/done.html.twig', array(
                    "message" => $toShow, "title" => $order->getIsdone() ? "Success" : "Failed", "success" => $success, "fname" => $order->getBillingfirstname()
        ));
    }

    /**
     * @Route("/authorize-card", name="authorize_card")
     */
    function authorizeCreditCardAction(Request $req) {
        $amount = 0.01;
        $number = preg_replace('/\s+/', '', $req->request->get('number'));
        $expiration = $req->request->get('expiration');
        $code = $req->request->get('code');

        $string = '';
        $return = ['success' => false];


        // Common setup for API credentials
        $merchantAuthentication = new MerchantAuthenticationType();
        $merchantAuthentication->setName($this->getSetting('authorizenet_id'));
        $merchantAuthentication->setTransactionKey($this->getSetting('authorizenet_key'));
        $refId = 'ref' . time();

        // Create the payment data for a credit card
        $creditCard = new CreditCardType();
        $creditCard->setCardNumber($number);
        $creditCard->setExpirationDate($expiration);
        $creditCard->setCardCode($code);

        $paymentOne = new PaymentType();
        $paymentOne->setCreditCard($creditCard);

        //create a transaction
        $transactionRequestType = new TransactionRequestType();
        $transactionRequestType->setTransactionType("authOnlyTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setPayment($paymentOne);

        $request = new CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);

        $controller = new CreateTransactionController($request);
        $response = $controller->executeWithApiResponse($this->getMode());

        if ($response != null) {


            if ($response->getMessages()->getResultCode() == 'Ok') {
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $return['success'] = true;

                    $string.= " Transaction Response code: " . $tresponse->getResponseCode() . "<br />";
                    $string.= " Successfully created a transaction with Auth code : " . $tresponse->getAuthCode() . "<br />";
                    $string.= " TRANS ID: " . $tresponse->getTransId() . "<br />";
                    $string.= " Code: " . $tresponse->getMessages()[0]->getCode() . "<br />";
                    $string.= " Description: " . $tresponse->getMessages()[0]->getDescription() . "<br />";
                } else {
                    $string.= "Transaction Failed \n";
                    if ($tresponse->getErrors() != null) {
                        $string.= " Error code: " . $tresponse->getErrors()[0]->getErrorCode() . "<br />";
                        $string.= " Error message: " . $tresponse->getErrors()[0]->getErrorText() . "<br />";
                    }
                }
            } else {
                $string.= "Transaction Failed <br />";
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $string.= " Error code: " . $tresponse->getErrors()[0]->getErrorCode() . "<br />";
                    $string.= " Error message: " . $tresponse->getErrors()[0]->getErrorText() . "<br />";
                } else {
                    $string.= " Error code: " . $response->getMessages()->getMessage()[0]->getCode() . "<br />";
                    $string.= " Error message: " . $response->getMessages()->getMessage()[0]->getText() . "<br />";
                }
            }
        } else {
            $string.= "No response returned <br />";
        }

        $return['message'] = $string;

        return new JsonResponse($return);
    }

}
