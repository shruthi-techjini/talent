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

class ResetPasswordType extends AbstractType{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		->add('password', RepeatedType::class, array(
				'type' => PasswordType::class,
				'invalid_message' => 'Password should match',
				'constraints' => array(
						//new NotNull(),
						new Length(array(
								'min' => 6,
								'max' => 10,
								'minMessage' => 'Password should be minimum of length 6 characters',
								'maxMessage' => 'Password should be maximum of length 10 characters'
						)),
						new Regex(array(
								'pattern' => "/^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",
							    'message' => 'Password should atlest contain 1 number, 1 uppercase letter, 1 lowercase letter.',
						))
				),
				'options' => array('attr' => array('class' => 'form-control')),
				'required' => true,
				'first_options'  => array('attr' => array(
						'class'  => 'form-control',
						'placeholder' => 'Password',
				),
						'label' => false,
				),
				'second_options' => array('attr' => array(
						'class'  => 'form-control',
						'placeholder' => 'Repeat Password',
				),
						'label' => false,
				),
		))
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