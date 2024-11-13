<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Plat;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantity')
            ->add('total')
            ->add('dateCommande', null, [
                'widget' => 'single_text',
            ])
            ->add('etat')
            ->add('nomClient')
            ->add('telephoneClient')
            ->add('emailClient')
            ->add('adresseClient')
            ->add('idPlat', EntityType::class, [
                'class' => Plat::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
