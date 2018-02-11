<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Repository\CategoryRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SubcategoryType extends AbstractType
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
       							)))
       	
//         		->add('categoryId',ChoiceType::class, array('label' => 'Category', 'required' => true, 'choices' => array_flip(CategoryRepository::$statusArray)));
        		->add('categoryId', EntityType::class, array(
        				'label' => 'Category',
        				'class' => 'AppBundle\Entity\Category',
        				'query_builder' => function ($repository) {
        				return $repository->createQueryBuilder('c')
        				->where('c.status = :status')
        				->setParameter('status', CategoryRepository::STATUS_ACTIVE);
        				},
        				'attr' => array(
        						'class' => 'form-control',
        				),
        				'choice_label' => function ($category) {
        				return $category->getName();
        				}
        				));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Subcategory'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_subcategory';
    }


}
