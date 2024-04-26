<?php

declare(strict_types=1);

namespace App;

use App\DependencyInjection\CompilerPass\PublicForTestsCompilerPass;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $this->addCompilerPass($container);
    }

    private function addCompilerPass(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new PublicForTestsCompilerPass());
    }
}
