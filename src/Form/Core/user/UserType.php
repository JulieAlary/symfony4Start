<?php

namespace App\Form\Core\user;

use App\Entity\Core\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
	public function buildForm( FormBuilderInterface $builder, array $options )
	{
		$builder
			->add('email', EmailType::class)
			->add('username', TextType::class)
			->add('firstname', TextType::class)
			->add('lastname', TextType::class)
			->add('plainPassword', RepeatedType::class, [
				'type' => PasswordType::class,
			]);
	}

	public function configureOptions( OptionsResolver $resolver )
	{
		$resolver->setDefaults([
			'data_class' => User::class,
            // enable CSRF protection for this form
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'user_item',
 		]);
	}
}
