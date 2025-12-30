<?php

namespace Xver\SymfonyAuthBundle\Account\Interface\Web\Form;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @api
 */
class ChangePasswordFormType extends ResetPasswordFormType
{
    #[\Override]
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('identifier', null, [
                'label' => new TranslatableMessage(
                    'email',
                    [],
                    'SymfonyAuthBundle'
                ),
                'required' => true,
                'mapped' => false,
                'attr' => ['style' => 'display:none;'],
                'label_attr' => ['style' => 'display:none;'],
            ])
            ->add('currentPassword', PasswordType::class, [
                'invalid_message' => new TranslatableMessage(
                    'errorPasswordsDifferent',
                    [],
                    'SymfonyAuthBundle'
                ),
                'required' => true,
                'mapped' => false,
                'label' => new TranslatableMessage(
                    'currentPassword',
                    [],
                    'SymfonyAuthBundle'
                ),
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank(),
                    new Length(null, 8, 200),
                ],
            ]);
        parent::buildForm($builder, $options);
    }
}
