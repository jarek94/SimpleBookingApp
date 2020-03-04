<?php


namespace App\EventListener;


use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    /**
     * @param ExceptionEvent $event
     * @throws \Exception
     *
     * Podstawowa metoda łapiąca wyjątki. Powinna ostać rozbudowana.
     * Np.: dołączyłem id które moze symbolizować event lub proces wsytapienia błędu.
     */
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        $message = ['error_message' => $exception->getMessage(), 'id' => Uuid::uuid4()];

        $response = new JsonResponse($message);

        if ($exception->getCode()) {
            $response->setStatusCode($exception->getCode());
        } else {
            $response->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        $event->setResponse($response);
    }
}
