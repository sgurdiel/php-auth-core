<?php

namespace Xver\SymfonyAuthBundle\Account\Application\Command;

use Xver\SymfonyAuthBundle\Account\Domain\Account;
use Xver\SymfonyAuthBundle\Account\Domain\AccountPersistenceInterface;

/**
 * @api
 */
class AccountCommand
{
    public function __construct(private AccountPersistenceInterface $accountPersistence) {}

    /**
     * @psalm-param non-empty-string $email
     * @psalm-param non-empty-string $password
     * @psalm-param list<string> $roles
     */
    public function create(
        string $email,
        string $password,
        array $roles
    ): Account {
        return new Account(
            $this->accountPersistence,
            $email,
            $password,
            $roles
        );
    }
}
