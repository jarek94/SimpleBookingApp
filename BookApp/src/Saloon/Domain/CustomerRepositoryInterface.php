<?php


namespace App\Saloon\Domain;


interface CustomerRepositoryInterface
{
    public function load(): ?array;

    public function save(Customer $customer);

    public function get(string $id): ?Customer;


}
