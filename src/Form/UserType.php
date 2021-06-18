<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('login', TextType::class, [
				'mapped' => true,
				'label' => 'Login :'
			])
			->add('roles', ChoiceType::class, [
				'choices'  => [
        			'Administrateur' => 'ROLE_ADMIN',
        			'Auteur' => 'ROLE_WRITER',
        			'Gestionnaire' => 'ROLE_MANAGER',
    			],
    			'choice_attr'  => [
        			'Administrateur' => ["ROLE_ADMIN"],
        			'Auteur' => ["ROLE_WRITER"],
        			'Gestionnaire' => ["ROLE_MANAGER"],
    			],
				'mapped' => true,
				'label' => 'Rôle :'
			])
			->add('password', TextType::class, [
				'mapped' => true,
				'label' => 'Mot de passe :'
			])
			->add('last_name', TextType::class, [
                'mapped' => true,
                'label' => 'Nom :',
            ])
            ->add('first_name', TextType::class, [
                'mapped' => true,
                'label' => 'Prénom :',
            ])
            ->add('email', EmailType::class, [
                'mapped' => true,
                'label' => 'Courriel :',
            ])
      	;

      	$builder
      		->get('roles')
      		->addModelTransformer(new CallbackTransformer(
      			function($rolesArray) {
      				return count($rolesArray)? $rolesArray[0]: null;
      			},
      			function ($rolesString) {
      				return [$rolesString];
      			}
      		));
	}


	public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}