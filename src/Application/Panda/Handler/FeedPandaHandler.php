<?php

namespace Application\Panda\Handler;

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
        $id = new PandaId($command->pandaId);
        $panda = $this->pandaRepository->get($id);
        if (!$panda) {
            throw PandaNotFoundException::fromId($id);
        }
        $panda->feed(new Bamboo($command->bambooLength));
        $this->pandaRepository->save($panda);
    }
}
