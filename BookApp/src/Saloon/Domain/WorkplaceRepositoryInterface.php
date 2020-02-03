<?php


namespace App\Saloon\Domain;


interface WorkplaceRepositoryInterface
{
    public function load(): ?array;

    public function save(Workplace $workplace);

    public function get(int $id): ?Workplace;


}
