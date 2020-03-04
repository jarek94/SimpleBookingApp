<?php


namespace App\Order\Domain\Policy;


use App\Order\Application\MakeAppointmentCommand;
use App\Order\Domain\Appointment;

interface AvailabilityPolicy
{
    /**
     * @param string $workplaceId
     * @param Appointment $appointment
     * @return bool
     *
     * Metoda powinan przyjmować raczej $worplaceId jako value object, aby zapewnic spójnośc systemu
     * w tym wypadku dla uproszczenia pozostawiono typ prosty.
     */
    public function isSatisfied(MakeAppointmentCommand $appointment): bool;

}
