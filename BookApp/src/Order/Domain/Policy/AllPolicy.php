<?php


namespace App\Order\Domain\Policy;


use App\Order\Application\MakeAppointmentCommand;
use App\Order\Domain\AppointmentRepositoryInterface;
use App\Order\Domain\Exception\BadRequest;
use App\Order\Domain\WorkplaceRepositoryInterface;

class AllPolicy implements AvailabilityPolicy
{
    /**
     * @var AppointmentRepositoryInterface
     */
    private AppointmentRepositoryInterface $appointmentRepository;
    /**
     * @var WorkplaceRepositoryInterface
     */
    private WorkplaceRepositoryInterface $workplaceRepository;


    public function __construct(AppointmentRepositoryInterface $appointmentRepository, WorkplaceRepositoryInterface $workplaceRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
        $this->workplaceRepository = $workplaceRepository;
    }

    /**
     * @inheritDoc
     * @param MakeAppointmentCommand $appointment
     * @return bool
     * @throws BadRequest
     * @throws \App\Order\Domain\Exception\ClientDuplicateAtTime
     * @throws \App\Order\Domain\Exception\WorkplacAlreadyBooked
     * @throws \App\Order\Domain\Exception\WorkplaceNotFoundException
     */
    public function isSatisfied(MakeAppointmentCommand $appointment): bool
    {

        //tutaj nalezy rozwazyć zastosowanie metody wytwórczej

        (new WorkingHoursPolicy())->isSatisfied($appointment);
        (new DateTimeFuturePolicy())->isSatisfied($appointment);
        (new WorkplaceAvabilityPolicy($this->appointmentRepository, $this->workplaceRepository))->isSatisfied($appointment);
        (new ClinetUniqueAtTimePolicy($this->appointmentRepository, $this->workplaceRepository))->isSatisfied($appointment);

        return true;

    }

}
