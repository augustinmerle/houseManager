<?php

namespace Atc\Bundle\HouseShareBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DateRegType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	      $yearsrange = array();
	      for($i=0; $i<3; $i++) 
	      { 
		        $yearsrange[] = date('Y') +$i ;
        }
        $builder
            ->add('title')
            ->add('startDatetime', 'date', array(
						    'input'  => 'datetime',
						    'widget' => 'choice',
						    'years'  => $yearsrange
						))
            ->add('endDatetime', 'date', array(
						    'input'  => 'datetime',
						    'widget' => 'choice',
						    'years'  => $yearsrange
						))
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Atc\Bundle\HouseShareBundle\Entity\DateReg'
        ));
    }

    public function getName()
    {
        return 'atc_bundle_housesharebundle_dateregtype';
    }
}
