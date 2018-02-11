<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Repository\CategoryRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use AppBundle\Entity\UserProfile;

class EditProfileType extends AbstractType
{
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
// 			->add('userId', null, array(
// 				'label' => 'First Name',
// 				'required'=> true,
// 				'attr' => array(
// 						'class' => 'form-control',
// 						'placeholder' => 'First Name'
// 				)))
// 			->add('lastName', null, array(
// 						'label' => 'Last Name',
// 						'required'=> true,
// 						'attr' => array(
// 								'class' => 'form-control',
// 								'placeholder' => 'Last Name'
// 						)))
// 			->add('email', null, array(
// 								'label' => 'Email',
// 								'required'=> true,
// 								'disabled'=>true,
// 								'attr' => array(
// 										'class' => 'form-control',
// 										'placeholder' => 'Email Address',
// 								)))
								
			->add('imageFile',FileType::class,array(
					'label'=>'Profile Pic',
			));
		
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => UserProfile::class
		));
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix()
	{
		return 'user_profile';
	}
	
}