<?php

namespace Infrastructure\Panda\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Panda\Model\Panda;
use Domain\Panda\Model\PandaId;
use Domain\Panda\PandaRepository;

class PandaRepositoryUsingDoctrine extends ServiceEntityRepository implements PandaRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Panda::class);
    }

    public function get(PandaId $id): ?Panda
    {
        return $this->find($id->getId());
    }

    public function save(Panda $panda): void
    {
        $this->_em->persist($panda);
        $this->_em->flush();
    }
}
