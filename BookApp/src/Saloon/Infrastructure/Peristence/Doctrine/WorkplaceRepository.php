<?php


namespace App\Saloon\Infrastructure\Peristence\Doctrine;


use App\Saloon\Domain\Workplace;
use App\Saloon\Domain\WorkplaceRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WorkplaceRepository extends ServiceEntityRepository   implements  WorkplaceRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Workplace::class);
    }



    public function load(): ?array
    {
        // TODO: Implement load() method.
    }

    public function save(Workplace $workplace)
    {
        // TODO: Implement save() method.
    }

    public function get(int $id): ?Workplace
    {
        return $this->_em->find(Workplace::class, $id);

    }
}
