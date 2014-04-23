<?php

namespace Atc\Bundle\HouseShareBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        // add your custom field
        $builder->add('family', 'choice', array(
				    'choices'   => array(
					       'Joseph' => 'Famille Joseph', 
					       'Robert' => 'Famille Robert',
					       'Henry' => 'Famille Henry',
					       'Quitterie' => 'Famille Schoutheete',
					       'Valerie' => 'Famille Cotreuil',
					       'Sophie' => 'Famille Sophie',
					       'Severin' => 'Famille Severin',
					       'Louis' => 'Famille Louis',
					       'Sabine' => 'Famille Colles',
					   ),
				    'required'  => true,
				));
    }
    public function getName()
    {
        return 'atc_user_profile';
    }
}