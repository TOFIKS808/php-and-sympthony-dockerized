<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class FunctionalTestCase extends KernelTestCase
{
    protected KernelInterface $k;

    protected function setUp(): void
    {
        parent::setUp();
        $this->k = self::bootKernel();
        $this->getTestContainer();
    }

    protected function getTestContainer(): ContainerInterface
    {
        return $this->k->getContainer();
    }
}
