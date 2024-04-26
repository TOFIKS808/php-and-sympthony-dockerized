<?php

declare(strict_types=1);

namespace App\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use function str_contains;

class PublicForTestsCompilerPass implements CompilerPassInterface
{
    private string $namespace;

    public function __construct(string $namespace = 'App')
    {
        $this->namespace = $namespace;
    }

    public function process(ContainerBuilder $container): void
    {
        if (! $this->isPHPUnit()) {
            return;
        }

        foreach ($container->getDefinitions() as $definition) {
            if (
                $definition->getClass() !== null
                && ! $definition->isPublic()
                && $this->namespace
                && str_contains($definition->getClass(), $this->namespace)
            ) {
                $definition->setPublic(true);
            }
        }
    }

    private function isPHPUnit(): bool
    {
        // there constants are defined by PHPUnit
        return defined('PHPUNIT_COMPOSER_INSTALL') || defined('__PHPUNIT_PHAR__');
    }
}
