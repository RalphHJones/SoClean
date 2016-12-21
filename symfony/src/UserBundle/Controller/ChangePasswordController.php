<?php
// src/UserBundle/Controller/ChangePasswordController.php
namespace UserBundle\Controller;

use FOS\UserBundle\Controller\ChangePasswordController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class ChangePasswordController extends BaseController
{
    public function changePasswordAction(Request $request)
    {
        $user = $this->getUser();

        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.change_password.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');

            $userManager->updateUser($user);

            return $this->render('FOSUserBundle:ChangePassword:changePassword.html.twig', array(
                'form' => $form->createView(),"success" => "Password changed successfully"
            ));
        }

        return $this->render('FOSUserBundle:ChangePassword:changePassword.html.twig', array(
            'form' => $form->createView(),"success" => Null
        ));
    }
}