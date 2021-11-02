<?php

namespace Application\Panda\Query;

use Domain\Panda\Model\Panda;

class GetPandaOutput
{
    public function __construct(
        public int $id,
        public bool $hungry,
    ) {
    }

    public static function fromPanda(Panda $panda): self
    {
        return new self(
            id: $panda->getId()->getId(),
            hungry: $panda->isHungry(),
        );
    }
}
