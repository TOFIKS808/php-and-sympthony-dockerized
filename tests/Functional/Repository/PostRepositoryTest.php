<?php

declare(strict_types=1);

namespace App\Tests\Functional\Repository;

use App\Repository\PostRepository;
use App\Tests\Functional\FunctionalTestCase;

class PostRepositoryTest extends FunctionalTestCase
{
    public function testFindAll(): void
    {
        /** @var PostRepository$repository */
        $repository = $this->getTestContainer()
            ->get(PostRepository::class);
        $this->assertInstanceOf(PostRepository::class, $repository);
    }
}
