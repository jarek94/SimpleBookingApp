<?php


namespace App\Saloon\Infrastructure\Peristence\Doctrine;


use App\Saloon\Domain\Customer;
use App\Saloon\Domain\CustomerRepositoryInterface;
use App\Saloon\Domain\Workplace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CustomerRepository extends ServiceEntityRepository implements CustomerRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Workplace::class);
    }


    public function load(): ?array
    {
        // TODO: Implement load() method.
    }

    public function save(Customer $workplace)
    {
        // TODO: Implement save() method.
    }

    public function get(string $id): ?Customer
    {
        return $this->_em->find(Customer::class, $id);

    }
}

