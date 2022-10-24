<?php

namespace App\Form;

use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('secret', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Secret'
            ])
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Nom'
            ])
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
            )
            ->add('short_description', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Description courte'
            ])
            ->add('full_description', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Description longue'
            ])
            ->add('logo_url', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Lien vers le logo du client'
            ])
            ->add('url', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Lien vers le site du client'
            ])
            ->add('dpo', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Contact protetion des données (DPO)'
            ])
            ->add('technical_contact', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Contact technique'
            ])
            ->add('commercial_contact', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Contact commercial'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
