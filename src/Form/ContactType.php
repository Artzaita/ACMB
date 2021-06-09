<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class ContactType extends AbstractType
{
	 public function buildForm(FormBuilderInterface $builder, array $options)
	 {

	 	$builder
            ->add('lastName', TextType::class, [
                'mapped' => true,
                'label' => 'Nom :',
            ])
            ->add('firstName', TextType::class, [
                'mapped' => true,
                'label' => 'Prénom :',
            ])
            ->add('email', EmailType::class, [
                'mapped' => true,
                'label' => 'Courriel :',
            ])
            ->add('phone', NumberType::class, [
                'mapped' => true,
                'label' => 'Téléphone :',
            ])
            ->add('function', TextType::class, [
                'mapped' => true,
                'required' => false,
                'label' => 'Fonction :',
            ])
            ->add('society', TextType::class, [
                'mapped' => true,
                'label' => 'Société :',
            ])
            ->add('comment', TextareaType::class, [
                'mapped' => true,
                'label' => 'Message :',
            ])
            ->add('agreement', CheckboxType::class, [
                'mapped' => true,
                'label' => "En soumettant ce formulaire, j'accepte que les informations saisies soient exploitées dans le cadre d'une relation commerciale qui pourrait en découler.",
            ])
        ;
	 }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }


}