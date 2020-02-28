<?php


namespace App\EventListener;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        $message = ['error_message' => $exception->getMessage(), 'code' => $exception->getCode()];

        $code = ($exception->getCode()) ? $exception->getCode() : 500;
        $event->setResponse(new JsonResponse($message,$code));
    }
}
