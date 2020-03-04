<?php


namespace App\Order\Domain\Policy;


use App\Order\Application\MakeAppointmentCommand;
use App\Order\Domain\Exception\BadRequest;
use App\Order\Domain\Exception\DateTimeInThePast;

class DateTimeFuturePolicy implements AvailabilityPolicy
{


    /**
     * @inheritDoc
     * @throws BadRequest
     */
    public function isSatisfied(MakeAppointmentCommand $appointment): bool
    {
        $date = $appointment->getDateTime()->getValue();

        $now = new \DateTime();

        if($date < $now) {
            throw new DateTimeInThePast();
        }

        return true;
    }

}
