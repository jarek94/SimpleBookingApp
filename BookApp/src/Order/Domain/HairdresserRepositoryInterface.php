<?php


namespace App\Order\Domain;


interface HairdresserRepositoryInterface
{
    public function load(): ?array;

    public function save(Hairdresser $hairdresser);

    public function get(string $id): ?Hairdresser;


}
