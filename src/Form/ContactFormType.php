<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom',])
            ->add('prenom', TextType::class, ['label' => 'Prenom',])
            ->add('email', EmailType::class, ['label' => 'Email',])
            ->add('telephone', TextType::class, ['label' => 'Telephone',])
            ->add('adresse', TextType::class, ['label' => 'Adresse',])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'required' => false
                ]
            )
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer le message'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
