<?php


namespace App\Saloon\Infrastructure\Peristence\Doctrine;


use App\Saloon\Domain\Workplace;
use App\Saloon\Domain\WorkplaceRepositoryInterface;

class WorkplaceRepository implements WorkplaceRepositoryInterface
{


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
        // TODO: Implement get() method.
    }
}
