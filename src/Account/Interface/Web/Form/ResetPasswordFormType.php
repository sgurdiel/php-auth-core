<?php

namespace Xver\SymfonyAuthBundle\Account\Interface\Web\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @api
 */
class ResetPasswordFormType extends AbstractType
{
    #[\Override]
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('newPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => new TranslatableMessage(
                    'errorPasswordsDifferent',
                    [],
                    'SymfonyAuthBundle'
                ),
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'mapped' => false,
                'first_options' => [
                    'label' => new TranslatableMessage(
                        'newPassword',
                        [],
                        'SymfonyAuthBundle'
                    ),
                    'attr' => ['autocomplete' => 'new-password'],
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
        ;
    }
}
