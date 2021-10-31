<?php

namespace Application\Panda;

use Application\Panda\Command\FeedPanda;
use Application\Panda\Exception\PandaNotFoundException;
use Domain\Panda\Model\Bamboo;
use Domain\Panda\Model\PandaId;
use Domain\Panda\PandaRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class FeedPandaHandler implements MessageHandlerInterface
{
    public function __construct(
        private PandaRepository $pandaRepository,
    ) {
    }

    public function __invoke(FeedPanda $command): void
    {
        $panda = $this->pandaRepository->get(new PandaId($command->pandaId));
        if (!$panda) {
            throw new PandaNotFoundException('Panda does not exist.');
        }
        $panda->feed(new Bamboo($command->bambooLength));
        $this->pandaRepository->save($panda);
    }
}
