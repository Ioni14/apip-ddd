<?php

namespace App\Tests\Acceptance;

use App\Application\Panda\FeedPandaService;
use App\Domain\Panda\Model\Panda;
use App\Domain\Panda\Model\PandaId;
use App\Infrastructure\Panda\Repository\PandaRepositoryUsingMemory;
use PHPUnit\Framework\TestCase;

class FeedPandaServiceTest extends TestCase
{
    public function test_should_not_be_hungry_anymore(): void
    {
        $panda = new Panda(new PandaId(1));
        $panda->doExercise();
        $repo = new PandaRepositoryUsingMemory();
        $repo->save($panda);

        $service = new FeedPandaService($repo);
        $service(1, 10);

        $panda = $repo->get(new PandaId(1));
        static::assertFalse($panda->isHungry(), 'Panda should not be hungry after feeding');
    }
}
