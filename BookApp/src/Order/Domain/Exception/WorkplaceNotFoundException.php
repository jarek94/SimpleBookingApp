<?php


namespace App\Order\Domain\Exception;


use Throwable;

class WorkplaceNotFoundException extends \Exception
{
    public function __construct($message = "Workplace not found", $code = 404, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->code = $code;

    }
}
