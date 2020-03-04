<?php


namespace App\Order\Application;

use App\Order\Domain\Appointment;
use App\Order\Domain\AppointmentRepositoryInterface;
use App\Order\Domain\Customer;
use App\Order\Domain\CustomerRepositoryInterface;
use App\Order\Domain\Policy\AllPolicy;
use App\Order\Domain\WorkplaceRepositoryInterface;
use Ramsey\Uuid\Uuid;
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

        $customer = $this->customerRepository->findOneByEmail($makeAppointmentCommand->getCustomer());

        if (!$customer) {
            $customer = new Customer(Uuid::uuid4(), null, null, $makeAppointmentCommand->getCustomer());
            $this->customerRepository->save($customer);
        }

        $makeAppointmentCommand->setCustomer($customer->getId());


        (new AllPolicy($this->appointmentRepository, $this->workplaceRepository))->isSatisfied($makeAppointmentCommand);

        $workplace = $this->workplaceRepository->get($makeAppointmentCommand->getWorkplace());

        $date = $makeAppointmentCommand->getDateTime()->getValue();


        $date->format('i');

        $appointment = new Appointment(
            $makeAppointmentCommand->getId(),
            $workplace,
            $customer,
            $date,
            null
        );

        $this->appointmentRepository->save($appointment);

    }

}
