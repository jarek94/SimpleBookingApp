<?php


namespace App\Order\Application;

use App\Order\Domain\Appointment;
use App\Order\Domain\AppointmentRepositoryInterface;
use App\Order\Domain\Customer;
use App\Order\Domain\CustomerRepositoryInterface;
use App\Order\Domain\Exception\BadRequest;
use App\Order\Domain\Exception\WorkplacAlreadyBooked;
use App\Order\Domain\Exception\WorkplaceNotFoundException;
use App\Order\Domain\WorkplaceRepositoryInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;


class MakeAppointmentHandler implements MessageHandlerInterface
{
    /**
     * @var AppointmentRepositoryInterface
     */
    private AppointmentRepositoryInterface $appointmentRepository;
    /**
     * @var WorkplaceRepositoryInterface
     */
    private WorkplaceRepositoryInterface $workplaceRepository;
    /**
     * @var CustomerRepositoryInterface
     */
    private CustomerRepositoryInterface $customerRepository;


    public function __construct(AppointmentRepositoryInterface $appointmentRepository, WorkplaceRepositoryInterface $workplaceRepository, CustomerRepositoryInterface $customerRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
        $this->workplaceRepository = $workplaceRepository;
        $this->customerRepository = $customerRepository;
    }

    public function __invoke(MakeAppointmentCommand $makeAppointmentCommand)
    {


        $workplace = $this->workplaceRepository->get($makeAppointmentCommand->getWorkplace());


        if (!$workplace) {
            throw  new WorkplaceNotFoundException();
        }


        $customer = $this->customerRepository->findOneByEmail($makeAppointmentCommand->getCustomer());

        if (!$customer) {
            $customer = new Customer(Uuid::uuid4(), null, null, $makeAppointmentCommand->getCustomer());
            $this->customerRepository->save($customer);
        }


        $date = new \DateTime($makeAppointmentCommand->getDateTime());

        if($date->format('H'>19 ) || $date->format('H')<8 || !in_array($date->format('i'),['00','30'])){

            throw new BadRequest();

            }
        $date->format('i');

        $appointment = new Appointment(
            $makeAppointmentCommand->getId(),
            $workplace,
            $customer,
            $date,
            null
        );

        try {
            $this->appointmentRepository->save($appointment);
        }catch (\Exception $exception){

            throw new WorkplacAlreadyBooked();

        }

    }

}
