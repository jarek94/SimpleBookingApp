<?php


namespace App\Order\Domain\Policy;


use App\Order\Application\MakeAppointmentCommand;
use App\Order\Domain\AppointmentRepositoryInterface;
use App\Order\Domain\Exception\ClientDuplicateAtTime;
use App\Order\Domain\Exception\WorkplacAlreadyBooked;
use App\Order\Domain\Exception\WorkplaceNotFoundException;
use App\Order\Domain\WorkplaceRepositoryInterface;

class ClinetUniqueAtTimePolicy
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
     * @throws ClientDuplicateAtTime
     */
    public function isSatisfied(MakeAppointmentCommand $appointment): bool
    {

        $workplace = $this->workplaceRepository->get($appointment->getWorkplace());

        if (!$workplace) {
            throw  new WorkplaceNotFoundException();
        }

        $clientDuplicate = $this->appointmentRepository->findClientDuplicate($appointment->getDateTime()->getValue(), $appointment->getCustomer());

        if ($clientDuplicate) {

            throw new ClientDuplicateAtTime();
        }

        return true;
    }

}
