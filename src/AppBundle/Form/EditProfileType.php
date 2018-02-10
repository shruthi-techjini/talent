<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Repository\CategoryRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EditProfileType extends AbstractType
{
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		->add('firstName', null, array(
				'label' => 'First Name',
				'required'=> true,
				'attr' => array(
						'class' => 'form-control',
						'placeholder' => 'First Name'
				)))
				->add('lastName', null, array(
						'label' => 'Last Name',
						'required'=> true,
						'attr' => array(
								'class' => 'form-control',
								'placeholder' => 'Last Name'
						)))
						->add('email', null, array(
								'label' => 'Email',
								'required'=> true,
								'disabled'=>true,
								'attr' => array(
										'class' => 'form-control',
										'placeholder' => 'Email Address',
								)))
								
								->add('file',FileType::class,array(
										'label'=>'Profile Pic'
								));
		
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'AppBundle\Entity\User'
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