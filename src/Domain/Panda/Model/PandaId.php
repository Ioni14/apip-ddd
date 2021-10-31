<?php

namespace App\Domain\Panda\Model;

class PandaId
{
    public function __construct(
        private int $id,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
