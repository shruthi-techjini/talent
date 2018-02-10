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

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$this->categoryId = null;
    	
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
    						'class' => 'AppBundle\Entity\Languages',
    						'query_builder' => function ($repository) {
    						return $repository->createQueryBuilder('c')
    						->where('c.status = :status')
    						->setParameter('status', CategoryRepository::STATUS_ACTIVE);
    						},
    						'choice_label' => function ($language) {
    						return $language->getName();
    						}
    						));
//     		->add('subCategoryId');
//     		, EntityType::class, array(
//     				'label' => 'Subcategory Id',
//     				'empty_data' => null,
//     				'class' => 'AppBundle\Entity\Subcategory',
// //     				'choice_label' => '',
//     				'query_builder' => function ($repository) {
//     						return $repository->createQueryBuilder('s')
//     						->where('s.categoryId = :id')
//     						->setParameter('id', $this->categoryId->getId());
//     				},
//     				'choice_label' => function ($subCategory) {
//     				return $subCategory->getName();
//     				}
//     				));
    		
//     		$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($category) {
//     			$data = $event->getData();
//     			$form = $event->getForm();
    		
// //     			if (is_array($data) && isset($data['categoryId'])) {
// //     				$this->categoryId = $data['categoryId'];
// //     			} else if (is_object($data)) {
// //     				$this->categoryId = $data->getCategoryId();
// //     			}
    			
    		
//     			$form->add('subCategoryId', EntityType::class, array(
//     					'label' => 'Subcategory Id',
//     				'empty_data' => null,
//     				'class' => 'AppBundle\Entity\Subcategory',
// //     				'choice_label' => '',
//     				'query_builder' => function ($repository) {
//     						return $repository->createQueryBuilder('s')
//     						->where('s.categoryId = :id')
//     						->setParameter('id', $this->categoryId);
//     				},
//     				'choice_label' => function ($subCategory) {
//     				return $subCategory->getName();
//     				}
//     				));
//     		});
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
