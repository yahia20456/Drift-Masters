<?php

namespace App\Form;

use App\Entity\Circuit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CircuitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomDuCircuit')
            ->add('limitationsonore')
            ->add('nbrevirage')
            ->add('longeurcircuit')
            ->add('largeurmin')
            ->add('largeurmax')
            ->add('pentecircuit')
            ->add('meilleurtour')
            ->add('proprietairecircuit')
            ->add('revetement')
            ->add('dateconstructionc')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Circuit::class,
        ]);
    }
}
