<?php

namespace Xver\SymfonyAuthBundle;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    /**
     * @return list<string> An array of allowed values for APP_ENV
     */
    #[\Override]
    private function getAllowedEnvs(): array
    {
        return ['prod', 'dev', 'test'];
    }
}
