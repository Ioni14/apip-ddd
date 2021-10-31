<?php

namespace Domain\Panda\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Panda
{
    #[Id]
    #[Column(type: 'integer')]
    private int $id;

    #[Column(type: 'integer')]
    private int $hungerAmount;

    public function __construct(PandaId $id)
    {
        $this->id = $id->getId();
        $this->hungerAmount = 0;
    }

    public function getId(): PandaId
    {
        return new PandaId($this->id);
    }

    public function doExercise(): void
    {
        $this->hungerAmount += 5;
    }

    public function feed(Bamboo $bamboo): void
    {
        $this->hungerAmount = max(0, $this->hungerAmount - $bamboo->getLength());
    }

    public function isHungry(): bool
    {
        return $this->hungerAmount > 0;
    }
}
