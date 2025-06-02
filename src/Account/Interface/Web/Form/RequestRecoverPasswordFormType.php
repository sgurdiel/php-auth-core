<?php

namespace Xver\SymfonyAuthBundle\Account\Interface\Web\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @api
 */
class RequestRecoverPasswordFormType extends AbstractType
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
        ;
    }
}
