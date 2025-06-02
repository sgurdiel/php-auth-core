<?php

namespace Xver\SymfonyAuthBundle\Account\Application\Query;

use Xver\SymfonyAuthBundle\Account\Domain\AccountInterface;

interface AccountQueryInterface
{
    public function findByIdentifierOrThrowException(string $identifier): AccountInterface;
}
