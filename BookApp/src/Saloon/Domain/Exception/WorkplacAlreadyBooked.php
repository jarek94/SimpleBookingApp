<?php


namespace App\Saloon\Domain\Exception;


class WorkplacAlreadyBooked
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
        $this->message = 'Workplace already booked';
        $this->code = 409;

    }
}
