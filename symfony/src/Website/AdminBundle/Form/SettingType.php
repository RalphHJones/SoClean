<?php

namespace Website\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class SettingType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {


        switch ($options['data']->getType()) {
            case 'html':
                $builder
                        ->add('value', CKEditorType::class, array(
                            'label' => 'Content'
                ));
                break;

            case 'string':
            case 'float':
                $builder
                        ->add('value', TextType::class, array(
                            'required' => false,
                            'label' => 'Value',
                            'attr' => array('class' => 'span7')
                ));
                break;

            case 'raw':
                $builder
                        ->add('value', TextareaType::class, array(
                            'required' => false,
                            'label' => 'Value',
                            'attr' => array('rows' => '10', 'cols' => 50, 'class' => 'span8')
                ));
                break;

            case 'integer':
                $builder
                        ->add('value', IntegerType::class, array(
                            'required' => false,
                            'label' => 'Value',
                            'attr' => array('class' => '')
                ));
                break;

            case 'boolean':
                $builder
                        ->add('value', CheckboxType::class, array(
                            'required' => false,
                            'label' => 'Value',
                            'attr' => array('class' => 'iphone')
                ));
                break;

            default:
                $builder
                        ->add('value', TextType::class, array(
                            'required' => false,
                            'label' => 'Value'
                ));
                break;
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Website\CommonBundle\Entity\Setting'
        ));
    }

    public function getName() {
        return 'setting';
    }

}
