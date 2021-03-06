<?php

namespace App\Form;

use App\Entity\ElementsForfaitises;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElementsForfaitisesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ForfaitEtape')
            ->add('FraisKilometrique')
            ->add('NuiteeHotel')
            ->add('RepasRestaurant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ElementsForfaitises::class,
        ]);
    }
}
