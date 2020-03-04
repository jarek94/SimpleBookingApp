<?php


namespace App\Order\Domain\Policy;


use App\Order\Application\MakeAppointmentCommand;
use App\Order\Domain\AppointmentRepositoryInterface;
use App\Order\Domain\CustomerRepositoryInterface;
use App\Order\Domain\Exception\WorkplacAlreadyBooked;
use App\Order\Domain\Exception\WorkplaceNotFoundException;
use App\Order\Domain\WorkplaceRepositoryInterface;

class WorkplaceAvabilityPolicy implements AvailabilityPolicy
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
     * @throws WorkplaceNotFoundException
     * @throws WorkplacAlreadyBooked
     */
    public function isSatisfied(MakeAppointmentCommand $appointment): bool
    {

        $workplace = $this->workplaceRepository->get($appointment->getWorkplace());

        if (!$workplace) {
            throw  new WorkplaceNotFoundException();
        }

        $booked = $this->appointmentRepository->findDuplicate($appointment->getDateTime()->getValue(), $appointment->getWorkplace());

        if ($booked) {
            throw new WorkplacAlreadyBooked();
        }

        return true;
    }

}
