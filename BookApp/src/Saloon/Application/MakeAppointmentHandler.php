<?php


namespace App\Saloon\Application;

use App\Saloon\Domain\Appointment;
use App\Saloon\Domain\AppointmentRepositoryInterface;
use App\Saloon\Domain\Customer;
use App\Saloon\Domain\CustomerRepositoryInterface;
use App\Saloon\Domain\Exception\WorkplaceNotFoundException;
use App\Saloon\Domain\WorkplaceRepositoryInterface;
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

        try {

            $workplace = $this->workplaceRepository->get($makeAppointmentCommand->getWorkplace());

        } catch (\Exception $exception) {

            throw  new WorkplaceNotFoundException();
        }


        $customer = $this->customerRepository->get($makeAppointmentCommand->getCustomer());

        if(!$customer)
            $customer = new Customer('id','Jarek', 'Walczak','jarekw');


        $appointment = new Appointment(
            $makeAppointmentCommand->getId(),
            $workplace,
            $customer,
            $makeAppointmentCommand->getDateTime(),
            null
        );
    }

}
