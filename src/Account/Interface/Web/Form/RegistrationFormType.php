<?php

namespace Xver\SymfonyAuthBundle\Account\Interface\Web\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @api
 */
class RegistrationFormType extends AbstractType
{
    #[\Override]
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => new TranslatableMessage(
                    'email',
                    [],
                    'SymfonyAuthBundle'
                ),
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Email([], 'invalidEmail'),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => new TranslatableMessage(
                    'errorPasswordsDifferent',
                    [],
                    'SymfonyAuthBundle'
                ),
                'options' => [
                    'attr' => [
                        'class' => 'password-field', 'autocomplete' => 'new-password',
                    ],
                ],
                'required' => true,
                'first_options' => [
                    'label' => new TranslatableMessage(
                        'password',
                        [],
                        'SymfonyAuthBundle'
                    ),
                    'constraints' => [
                        new NotBlank(),
                        new Length([
                            'min' => 8,
                            // max length allowed by Symfony for security reasons
                            'max' => 200,
                        ]),
                    ],
                ],
                'second_options' => ['label' => new TranslatableMessage(
                    'reenterPassword',
                    [],
                    'SymfonyAuthBundle'
                )],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => $options['agreeTerms_label'],
                'label_html' => true,
                'translation_domain' => false,
                'required' => true,
                'constraints' => [
                    new IsTrue([
                        'message' => new TranslatableMessage(
                            'mustAgreeTerms',
                            [],
                            'SymfonyAuthBundle'
                        ),
                    ]),
                ],
            ])
        ;
    }

    #[\Override]
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // ...,
            'agreeTerms_label' => '',
        ]);

        // you can also define the allowed types, allowed values and
        // any other feature supported by the OptionsResolver component
        $resolver->setAllowedTypes('agreeTerms_label', 'string');
    }
}
