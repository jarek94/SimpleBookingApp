<?php


namespace App\Order\Domain\Exception;


use Throwable;

class WorkplacAlreadyBooked extends \Exception
{
    public function __construct($message = "Workplace already booked", $code = 409, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->code = $code;

    }
}
