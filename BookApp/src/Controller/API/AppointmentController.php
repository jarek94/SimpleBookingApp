<?php


namespace App\Controller\API;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppointmentController extends AbstractController
{
    public function createApointment(Request $request){

        $params = json_decode($request->getContent(), true);

        dump($params);
        die();

        return new JsonResponse(['status'=>'created',201]);
    }

}
