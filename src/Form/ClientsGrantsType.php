<?php

namespace App\Form;

use App\Entity\Branches;
use App\Entity\Clients;
use App\Entity\ClientsGrants;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsGrantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'perms',
                TextareaType::class,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'label' => 'Permissions',
                    'data' => '{ "members_read": 0, "members_write": 0, "members_payment_schedules_read": 0, "members_products_read": 0, "members_schedules_read": 0, "members_add": 0, "payment_schedules_read": 0, "payment_schedules_write": 0, "members_statistic_read": 0, "payment_day_read": 0 }'
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
                'branch',
                EntityType::class,
                [
                    'class' => Branches::class,
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
            'data_class' => ClientsGrants::class,
        ]);
    }
}
