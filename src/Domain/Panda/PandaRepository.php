<?php

namespace App\Domain\Panda;

use App\Domain\Panda\Model\Panda;
use App\Domain\Panda\Model\PandaId;

interface PandaRepository
{
    public function get(PandaId $id): ?Panda;

    public function save(Panda $panda): void;
}
