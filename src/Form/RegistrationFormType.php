<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Courriel'
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Prénom'
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Nom'
            ])
            ->add(
                'plainPassword',
                PasswordType::class,
                [
                    // instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'mapped' => false,
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'class' => 'form-control'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                    'label' => 'Mot de passe'
                ]
            )
            ->add(
                'roles',
                ChoiceType::class,
                array(
                    'attr'  =>  array(
                        'class' => 'form-control',
                        'style' => 'margin:5px 0;'
                    ),
                    'choices' =>
                    array(
                        'ROLE_CLIENT' => array(
                            'Yes' => 'ROLE_CLIENT',
                        ),
                        'ROLE_STRUCTURE' => array(
                            'Yes' => 'ROLE_STRUCTURE'
                        ),
                    ),
                    'expanded' => false,
                    'multiple' => true,
                    'required' => true,
                )
            )
            ->add('manages', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
                'label' => 'Gère quelle salle de sport ? (vide si aucune)'
            ])
            ->add('owns', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
                'label' => 'Possède quelle salle(s) de sport ? (vide si aucune)'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
