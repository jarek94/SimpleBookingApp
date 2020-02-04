<?php


namespace App\Order\Domain\Exception;


use Throwable;

class WorkplaceNotFoundException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
        $this->message = 'Workplace not found';
        $this->code = 404;

    }

}
