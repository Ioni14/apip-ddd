<?php

namespace Domain\Panda\Model;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Application\Panda\Query\GetPandaOutput;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;

#[Entity]
#[ApiResource(
    collectionOperations: [],
    itemOperations: [
        'get' => ['path' => '/pandas/{id}', 'output' => GetPandaOutput::class],
    ],
)]
class Panda
{
    #[Id]
    #[Column(type: 'integer')]
    #[ApiProperty(identifier: true)]
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
