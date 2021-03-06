<?php


namespace App\Order\Domain\Exception;


use Throwable;

class BadRequest extends \Exception
{
    public function __construct($message = "Bad date format. ISO 8601 Allowed", $code = 400, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->code = $code;

    }
}
