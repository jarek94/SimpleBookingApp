<?php


namespace App\Order\Domain\Exception;


use Throwable;

class DateTimeInThePast extends \Exception
{
    public function __construct($message = "Selected date has passed", $code = 400, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->code = $code;

    }
}
