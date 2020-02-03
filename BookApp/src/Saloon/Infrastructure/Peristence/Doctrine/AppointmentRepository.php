<?php


namespace App\Saloon\Infrastructure\Peristence\Doctrine;


use App\Saloon\Domain\Appointment;
use App\Saloon\Domain\AppointmentRepositoryInterface;

class AppointmentRepository implements AppointmentRepositoryInterface
{

    public function load(): ?array
    {
        // TODO: Implement load() method.
    }

    public function save(Appointment $appointment)
    {
        // TODO: Implement save() method.
    }

    public function get(string $id): ?Appointment
    {
        // TODO: Implement get() method.
    }
}
