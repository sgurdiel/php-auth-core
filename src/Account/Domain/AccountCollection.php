<?php

namespace Xver\SymfonyAuthBundle\Account\Domain;

use Xver\PhpAppCoreBundle\Entity\Domain\EntityCollection;

/**
 * @template-extends EntityCollection<Account>
 *
 * @psalm-api
 */
class AccountCollection extends EntityCollection
{
    #[\Override]
    public function type(): string
    {
        return Account::class;
    }
}
