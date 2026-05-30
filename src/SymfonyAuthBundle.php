<?php

namespace Xver\SymfonyAuthBundle;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Kernel\AbstractBundle;
use Xver\SymfonyAuthBundle\SymfonyFramework\DependencyInjection\SymfonyAuthBundleExtension;

final class SymfonyAuthBundle extends AbstractBundle
{
    #[\Override]
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    #[\Override]
    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new SymfonyAuthBundleExtension();
        }

        return $this->extension ?: null;
    }
}
