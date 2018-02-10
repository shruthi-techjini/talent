<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
    	
    	$builder
    	->add('title', null, array(
    			'label' => 'Title',
    			'required'=> true,
    			'attr' => array(
    					'class' => 'form-control',
    					'placeholder' => 'Give the heading for your post'
    			)))
    			->add('content', TextareaType::class, array(
    					'label' => 'Body',
    					'required'=> true,
    					'attr' => array(
    							'class' => 'form-control',
    							'placeholder' => 'Write your complete post here'
    					)))
    					->add('image',FileType::class,array(
    							'label' => 'Image',
    							'required' => false,
    							
    					))
    			
    		->add('categoryId')->add('subCategoryId');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return '';
    }


}
