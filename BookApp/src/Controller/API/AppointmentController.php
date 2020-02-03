<?php


namespace App\Controller\API;


use App\Saloon\Application\MakeAppointmentCommand;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppointmentController extends AbstractController
{
    public function createApointment(Request $request){


        $params = json_decode($request->getContent(), true);


        $id = Uuid::uuid4();

        $this->dispatchMessage(new MakeAppointmentCommand($id,$params['customerEmail'],$params['workplace'],$params['date']));


        return new JsonResponse(['ID'=>$id],201);
    }

}
