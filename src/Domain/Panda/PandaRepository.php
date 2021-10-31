<?php

namespace Domain\Panda;

use Domain\Panda\Model\Panda;
use Domain\Panda\Model\PandaId;

interface PandaRepository
{
    public function get(PandaId $id): ?Panda;

    public function save(Panda $panda): void;
}
