<?php
declare(strict_types=1);

namespace App\Tests\Functional\Repository;

use App\Repository\PostRepository;
use App\Tests\Functional\FunctionalTestCase;


class PostRepositoryTest extends FunctionalTestCase
{
    public function test_find_all(): void
    {
        $repository = $this->getTestContainer()->get(PostRepository::class);
        dump($repository);
    }
}