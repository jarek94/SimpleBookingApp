<?php


namespace App\Controller\API;


use App\CRUD\Calendar\AppointmensMatcher;
use App\CRUD\Calendar\Calendar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class CalendarController extends AbstractController
{
    public function calendar(AppointmensMatcher $appointmensMatcher)
    {


        $response = $appointmensMatcher->match();

        return new JsonResponse($response);
    }


}
