<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use AppBundle\Repository\CategoryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$this->genre = $options['genres'];
    	$this->selectedGenres = $options['selectedGenres'];
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
    			->add('file',FileType::class,array(
    					'label' => 'Image',
   						'required' => false,
    			))
    			
    		->add('subCategoryId', EntityType::class, array(
    				'label' => 'Category',
    				'attr' => array(
    						'class' => 'form-control',
    				),
      				'class' => 'AppBundle\Entity\Subcategory',
    				'query_builder' => function ($repository) {
    				return $repository->createQueryBuilder('c')
    				->where('c.status = :status AND c.categoryId = :id')
    				->setParameter('status', CategoryRepository::STATUS_ACTIVE)
    				->setParameter('id', 1);
    				},
    				'choice_label' => function ($category) {
    				return $category->getName();
    				}
    				))
    		
    		->add('language', EntityType::class, array(
    						'label' => 'Language',
		    				'attr' => array(
		    						'class' => 'form-control',
		    				),
    						'class' => 'AppBundle\Entity\Languages',
    						'query_builder' => function ($repository) {
    						return $repository->createQueryBuilder('c')
    						->where('c.status = :status')
    						->setParameter('status', CategoryRepository::STATUS_ACTIVE);
    						},
    						'choice_label' => function ($language) {
    						return $language->getName();
    						}
    						))
   			->add('genre', ChoiceType::class, array(
    					'label' => 'Genre',
   						'mapped' => false,
   						'multiple' => true,
   						'expanded' => true,
   						'choices' => array_flip($this->genre),
   						'data' => $this->selectedGenres
    				));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\post',
        	'genres' => null,
        	'selectedGenres' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'post';
    }


}
