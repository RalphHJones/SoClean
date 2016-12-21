<?php

namespace Website\AdminBundle\Controller;

use Website\AdminBundle\Form\SettingType;
use Website\AdminBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Yaml\Yaml;

class SettingController extends Controller {

    public function indexAction($page, $category) {
        $objects = $this->getDoctrine()->getRepository('WebsiteCommonBundle:Setting')->findAllFilteredByCategory($category);
        $entities = $this->paginate($objects, $page, 30);

       // $this->addTitle('Settings');

        return $this->render('WebsiteAdminBundle:Setting:list.html.twig', compact('entities'));
    }

    public function editAction($id) {
        $entity = $this->getEntityManager()->find('WebsiteCommonBundle:Setting', $id);

        $title = 'Edit Setting';

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Setting entity.');
        }

        $this->addTitle($title);

        $form = $this->createForm(SettingType::class, $entity);

        return $this->render('WebsiteAdminBundle:Setting:edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'title' => $title
        ));
    }

    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebsiteCommonBundle:Setting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Setting entity.');
        }

        $form = $this->createForm(SettingType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($entity);
            $em->flush();

//            // update YML file based on ENV mode
//            $parameters = [];
//            $parameters['parameters'] = [];
//            $ymlSettings = $em->getRepository('WebsiteCommonBundle:Setting')->findAllYml();
//            foreach ($ymlSettings as $setting) {
//                $parameters['parameters'][$setting->getKey()] = $setting->getValue();
//            }
//
//            $yaml = Yaml::dump($parameters);
//            $path = $this->get('kernel')->getRootDir() . '/../app/config/config_dynamic_' . $this->get('kernel')->getEnvironment() . '.yml';
//            file_put_contents($path, $yaml);
//            // update YML file based on ENV mode

            return $this->redirect($this->generateUrl('admin_setting_edit', compact('id')));
        }

        return $this->render('WebsiteAdminBundle:Setting:edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

}
