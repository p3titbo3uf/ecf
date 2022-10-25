<?php

namespace App\Form;

use App\Entity\Branches;
use App\Entity\Clients;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BranchesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'label' => 'Nom'
                ]
            )
            ->add(
                'zipcode',
                IntegerType::class,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'label' => 'Code postal'
                ]
            )
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
            )
            ->add(
                'active',
                CheckboxType::class,
                [
                    // 'mapped' => false,
                    'attr' => [
                        'class' => 'form-check-input'
                    ],
                    'label' => 'Actif ?',
                    'required' => false
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
