<?php


namespace App\Order\Domain;


interface CustomerRepositoryInterface
{
    public function load(): ?array;

    public function save(Customer $customer);

    public function get(string $id): ?Customer;


}
