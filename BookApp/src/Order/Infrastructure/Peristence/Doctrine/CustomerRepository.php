<?php


namespace App\Order\Infrastructure\Peristence\Doctrine;


use App\Order\Domain\Customer;
use App\Order\Domain\CustomerRepositoryInterface;
use App\Order\Domain\Workplace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CustomerRepository extends ServiceEntityRepository implements CustomerRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }


    public function load(): ?array
    {
        // TODO: Implement load() method.
    }

    public function save(Customer $customer)
    {
        $this->_em->persist($customer);
        $this->_em->flush($customer);
    }

    public function get(string $id): ?Customer
    {
        return $this->_em->find(Customer::class, $id);

    }
}

