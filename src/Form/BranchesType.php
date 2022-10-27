<?php

namespace App\Form;

use App\Entity\Branches;
use App\Entity\Clients;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BranchesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('zipcode')
            ->add('active')
            ->add(
                'client',
                EntityType::class,
                [
                    'class' => Clients::class,
                    'choice_label' => 'name',
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'label' => 'Nom du client'
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Branches::class,
        ]);
    }
}
