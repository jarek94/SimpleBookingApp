<?php


namespace App\Order\Domain\Exception;


class BadRequest extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
        $this->message = 'Bad date format';
        $this->code = 409;

    }
}
