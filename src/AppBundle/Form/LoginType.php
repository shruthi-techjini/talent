<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\User;

class LoginType extends AbstractType{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		->add('email', null, array(
				'label' => false,
				'required'=> true,
				'constraints' => array(
						new Regex(array(
								'pattern' => "/^([a-z0-9.])*@gmail.com$/",
								'message' => 'Please enter a valid email.',
						))
				),
				'attr' => array(
						'class' => 'form-control',
						'placeholder' => 'Email Address',
				)))
		->add('password', PasswordType::class, array(
				'label' => false,
				'required'=> true,
				'attr' => array(
						'class' => 'form-control',
						'placeholder' => 'Password',
				)))
				;
	}
	
	public function configureOptions(OptionsResolver $resolver)
	{
	
		$resolver->setDefaults(array(
				'data_class' => User::class,
				'allow_extra_fields' => true,
		));
	
	}
	
	public function getBlockPrefix()
	{
		return '';
	}
		 
	
}