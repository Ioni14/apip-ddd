<?php

namespace App\Tests\Acceptance;

use Application\Panda\Command\FeedPanda;
use Application\Panda\Handler\FeedPandaHandler;
use Domain\Panda\Model\Panda;
use Domain\Panda\Model\PandaId;
use Infrastructure\Panda\Repository\PandaRepositoryUsingMemory;
use PHPUnit\Framework\TestCase;

class FeedPandaServiceTest extends TestCase
{
    public function testShouldNotBeHungryAnymore(): void
    {
        $panda = new Panda(new PandaId(1));
        $panda->doExercise();
        $repo = new PandaRepositoryUsingMemory();
        $repo->save($panda);

        $service = new FeedPandaHandler($repo);
        $service(new FeedPanda(1, 10));

        $panda = $repo->get(new PandaId(1));
        static::assertFalse($panda->isHungry(), 'Panda should not be hungry after feeding');
    }
}
