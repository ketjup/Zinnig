<?php

namespace App\Form;

use App\Entity\workshop;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkshopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam')
            ->add('min_personen')
            ->add('max_personen')
            ->add('datum')
            ->add('tijd')
            ->add('prijs')
            ->add('locatie_id')
            ->add('user_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => workshop::class,
        ]);
    }
}
