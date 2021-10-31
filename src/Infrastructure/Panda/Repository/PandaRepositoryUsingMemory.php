<?php

namespace App\Infrastructure\Panda\Repository;

use App\Domain\Panda\Model\Panda;
use App\Domain\Panda\Model\PandaId;
use App\Domain\Panda\PandaRepository;

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
