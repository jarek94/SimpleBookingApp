<?php


namespace App\Saloon\Infrastructure\Peristence\Doctrine;


use App\Saloon\Domain\Customer;
use App\Saloon\Domain\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{

    public function load(): ?array
    {
        // TODO: Implement load() method.
    }

    public function save(Customer $customer)
    {
        // TODO: Implement save() method.
    }

    public function get(string $id): ?Customer
    {
        // TODO: Implement get() method.
    }
}
