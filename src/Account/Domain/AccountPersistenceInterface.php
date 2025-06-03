<?php

namespace Xver\SymfonyAuthBundle\Account\Domain;

use Xver\PhpAppCoreBundle\Entity\Domain\EntityPersistenceInterface;
use Xver\PhpAppCoreBundle\Entity\Domain\EntityRepositoryInterface;

interface AccountPersistenceInterface extends EntityPersistenceInterface
{
    /**
     * @return AccountRepositoryInterface
     */
    #[\Override]
    public function getRepository(): EntityRepositoryInterface;
}
