<?php

declare(strict_types=1);

namespace Xver\SymfonyAuthBundle\Tests\unit\Account\Domain;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Xver\SymfonyAuthBundle\Account\Domain\Account;
use Xver\SymfonyAuthBundle\Account\Domain\AccountCollection;

/**
 * @internal
 */
#[CoversClass(AccountCollection::class)]
class AccountCollectionTest extends TestCase
{
    public function testCollection(): void
    {
        $accountCollection = new AccountCollection([]);
        $this->assertSame(Account::class, $accountCollection->type());
    }
}
