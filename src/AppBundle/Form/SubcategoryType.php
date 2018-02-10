<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Repository\CategoryRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SubcategoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       	$builder->add('name',TextType::class, array('label' => 'Name', 'required' => true))
      			->add('description',TextareaType::class, array('label' => 'Name', 'required' => true))
        		->add('status',ChoiceType::class, array('label' => 'Status', 'required' => true, 'choices' => array_flip(CategoryRepository::$statusArray)))
        		->add('categoryId',ChoiceType::class, array('label' => 'Category', 'required' => true, 'choices' => array_flip(CategoryRepository::$statusArray)));
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
