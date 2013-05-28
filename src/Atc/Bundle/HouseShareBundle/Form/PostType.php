<?php

namespace Atc\Bundle\HouseShareBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('post')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Atc\Bundle\HouseShareBundle\Entity\Post'
        ));
    }

    public function getName()
    {
        return 'atc_bundle_housesharebundle_posttype';
    }
}
