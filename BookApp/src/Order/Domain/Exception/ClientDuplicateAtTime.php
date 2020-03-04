<?php


namespace App\Order\Domain\Exception;


use Throwable;

class ClientDuplicateAtTime extends \Exception
{
    public function __construct($message = "Client appointment allready exist at selected time.", $code = 409, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->code = $code;

    }
}
