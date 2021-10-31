<?php

namespace App\Domain\Panda\Model;

class Panda
{
    private PandaId $id;
    private int $hungerAmount;

    public function __construct(PandaId $id)
    {
        $this->id = $id;
        $this->hungerAmount = 0;
    }

    public function getId(): PandaId
    {
        return $this->id;
    }

    public function doExercise(): void
    {
        $this->hungerAmount += 5;
    }

    public function feed(Bamboo $bamboo): void
    {
        $this->hungerAmount = min(0, $this->hungerAmount - $bamboo->getLength());
    }

    public function isHungry(): bool
    {
        return $this->hungerAmount > 0;
    }
}
