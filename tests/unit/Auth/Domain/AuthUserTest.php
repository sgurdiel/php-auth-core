<?php

namespace Xver\SymfonyAuthBundle\Tests\unit\Auth\Domain;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Xver\SymfonyAuthBundle\Auth\Domain\AuthUser;

/**
 * @internal
 */
#[CoversClass(AuthUser::class)]
class AuthUserTest extends TestCase
{
    public function testEntity(): void
    {
        $email = 'test@example.com';
        $roles = ['ROLE_USER'];
        $password = 'password';
        $authUser = new AuthUser($email, $roles, $password);
        $this->assertSame($email, $authUser->getUserIdentifier());
        $this->assertSame($roles, $authUser->getRoles());
        $this->assertSame($password, $authUser->getPassword());
        $authUser->eraseCredentials();
    }
}
