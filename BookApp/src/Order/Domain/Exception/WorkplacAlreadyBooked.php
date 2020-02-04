<?php


namespace App\Order\Domain\Exception;


class WorkplacAlreadyBooked extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
        $this->message = 'Workplace already booked';
        $this->code = 409;

    }
}
