<?php


namespace App\Order\Infrastructure\Peristence\Doctrine;


use App\Order\Domain\Appointment;
use App\Order\Domain\AppointmentRepositoryInterface;
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

    public function getAppointsmentFromNow()
    {

        $now = new \DateTime('now');

        $qb = $this->_em->createQueryBuilder();
        $qb->select('a')
            ->from(Appointment::class, 'a')
            ->where('a.dateTime > :date')
            ->setParameter('date', $now);
//            ->orderBy('a.date_time', 'ASC');
        $query = $qb->getQuery();
        return $query->getResult();

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
