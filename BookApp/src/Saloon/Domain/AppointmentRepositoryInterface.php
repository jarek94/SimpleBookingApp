<?php


namespace App\Saloon\Domain;


interface AppointmentRepositoryInterface
{
    public function load(): ?array;

    public function save(Appointment $appointment);

    public function get(string $id): ?Appointment;


}
