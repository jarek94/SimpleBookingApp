<?php


namespace App\CRUD\Calendar;


use App\Order\Domain\Appointment;
use App\Order\Domain\AppointmentRepositoryInterface;

class AppointmensMatcher
{
    /**
     * @var Calendar
     */
    private Calendar $calendar;
    /**
     * @var AppointmentRepositoryInterface
     */
    private AppointmentRepositoryInterface $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository, Calendar $calendar)
    {

        $this->calendar = $calendar;
        $this->appointmentRepository = $appointmentRepository;
    }

    public function match()
    {

        $date = $this->calendar->calendar(30);
        $appointments = $this->appointmentRepository->getAppointsmentFromNow();


        /** @var Appointment $appointemnt */
        foreach ($appointments as $appointemnt) {

            $date[$appointemnt->getDateTime()->format('Y-m-d')][$appointemnt->getDateTime()->format('H:i')] = 0;

        }

        return $date;

    }

}
