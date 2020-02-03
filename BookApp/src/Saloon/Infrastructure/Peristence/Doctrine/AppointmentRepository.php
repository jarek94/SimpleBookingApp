<?php


namespace App\Saloon\Infrastructure\Peristence\Doctrine;


use App\Saloon\Domain\Appointment;
use App\Saloon\Domain\AppointmentRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class AppointmentRepository extends ServiceEntityRepository implements AppointmentRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointment::class);
    }

    public function load(): ?array
    {

         return $this->_em->findAll(Appointment::class);
    }

    public function save(Appointment $appointment)
    {
        $this->_em->persist($appointment);
        $this->_em->flush($appointment);
    }

    public function get(string $id): ?Appointment
    {
        return $this->_em->find(Appointment::class, $id);
    }
}
