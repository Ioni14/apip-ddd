<?php

namespace App\Application\Panda;

use App\Domain\Panda\Model\Bamboo;
use App\Domain\Panda\Model\PandaId;
use App\Domain\Panda\PandaRepository;

class FeedPandaService
{
    public function __construct(
        private PandaRepository $pandaRepository,
    ) {
    }

    public function __invoke(int $pandaId, int $bambooLength): void
    {
        $panda = $this->pandaRepository->get(new PandaId($pandaId));
        if (!$panda) {
            throw new \RuntimeException('Panda does not exist.');
        }
        $panda->feed(new Bamboo($bambooLength));
        $this->pandaRepository->save($panda);
    }
}
