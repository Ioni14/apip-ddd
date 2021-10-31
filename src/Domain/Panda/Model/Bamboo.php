<?php

namespace Domain\Panda\Model;

class Bamboo
{
    public function __construct(
        private int $length,
    ) {
    }

    public function getLength(): int
    {
        return $this->length;
    }
}
