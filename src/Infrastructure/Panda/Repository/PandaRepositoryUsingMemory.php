<?php

namespace Infrastructure\Panda\Repository;

use Domain\Panda\PandaRepository;
use Domain\Panda\Model\Panda;
use Domain\Panda\Model\PandaId;

class PandaRepositoryUsingMemory implements PandaRepository
{
    /** @var Panda[] */
    public array $store;

    public function get(PandaId $id): ?Panda
    {
        return $this->store[$id->getId()] ?? null;
    }

    public function save(Panda $panda): void
    {
        $this->store[$panda->getId()->getId()] = $panda;
    }
}
