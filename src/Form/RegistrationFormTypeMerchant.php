<?php

namespace App\Form;

use App\Entity\Account;
use App\Entity\MerchantSpecification;
use App\Entity\MerchantType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

    class RegistrationFormTypeMerchant extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('email')
                ->add('plainPassword', PasswordType::class, [
                    // instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'mapped' => false,
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez entrez un mot de passe',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                ])
                ->add('name', TextType::class, [
                    'label' => 'Nom de votre entreprise',
                ])
                ->add('webSiteLink', TextType::class, [
                    'label' => 'Votre site web *',
                    'required' => false,
                ])
                ->add('merchantSpecification', EntityType::class, [
                    'label' => 'Specialité *',
                    'class' => MerchantSpecification::class,
                    'choice_label' => 'name',
                    'required' => false,
                ])
                ->add('merchantType', EntityType::class, [
                    'label' => 'Type *',
                    'class' => MerchantType::class,
                    'choice_label' => 'name',
                    'required' => false,
                ])
                ->add('address', TextType::class, [
                    'label' => 'Adresse *',
                    'required' => false,
                ])
                ->add('city', TextType::class, [
                    'label' => 'Ville *',
                    'required' => false,
                ])
                ->add('postalCode', TextType::class, [
                    'label' => 'Code Postal *',
                    'required' => false,
                ])
            ;
        }

        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
        }
    }
