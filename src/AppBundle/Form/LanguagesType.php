<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Repository\CategoryRepository;

class LanguagesType extends AbstractType
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
            'data_class' => 'AppBundle\Entity\Languages'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_languages';
    }


}
