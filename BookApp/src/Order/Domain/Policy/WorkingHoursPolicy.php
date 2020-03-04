<?php


namespace App\Order\Domain\Policy;


use App\Order\Application\MakeAppointmentCommand;
use App\Order\Domain\Exception\BadRequest;

class WorkingHoursPolicy implements AvailabilityPolicy
{


    /**
     * @inheritDoc
     * @throws BadRequest
     */
    public function isSatisfied(MakeAppointmentCommand $appointment): bool
    {
        $date = $appointment->getDateTime()->getValue();

        if ($date->format('H') > 19 || $date->format('H') < 8 || !in_array($date->format('i'), ['00', '30'])) {

            throw new BadRequest();

        }
        return true;
    }

}
