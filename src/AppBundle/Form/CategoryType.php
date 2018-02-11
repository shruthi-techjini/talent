<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Repository\CategoryRepository;

class CategoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        	$builder
        	->add('name', null, array(
        			'label' => 'Name',
        			'required'=> true,
        			'attr' => array(
        					'class' => 'form-control',
        			)))
        			->add('description', TextareaType::class, array(
        					'label' => 'Body',
        					'required'=> true,
        					'attr' => array(
        							'class' => 'form-control',
        					)))
        					->add('status', ChoiceType::class, array(
        							'label' => 'Status',
        							'required'=> true,
        							'choices' => array_flip(CategoryRepository::$statusArray),
        							'attr' => array(
        									'class' => 'form-control',
        							)));
        							 
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Category'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_category';
    }


}
