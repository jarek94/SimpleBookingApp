<?php


namespace App\Order\Domain;


use Cassandra\Date;

interface AppointmentRepositoryInterface
{
    public function load(): ?array;

    public function save(Appointment $appointment);

    public function get(string $id): ?Appointment;

    public function findDuplicate(\DateTime $date, string $workplaceId);

    public function findClientDuplicate(\DateTime $date, string $customer);


}
