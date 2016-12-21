<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ProductType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name')
                ->add('price')
                ->add('sku')
                ->add('isdiscount', CheckboxType::class, array(
                    'label' => 'Discounted Product',
                    'required' => false,
                ))
                ->add('isextra', CheckboxType::class, array(
                    'label' => 'Extra Product',
                    'required' => false,
                ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Product'
        ));
    }

}
