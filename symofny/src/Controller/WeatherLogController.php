<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WeatherLogsRepository;
use Symfony\Component\HttpFoundation\Request;

class WeatherLogController
{

    private $weatherLogsRepository;

    public function __construct(WeatherLogsRepository $weatherLogsRepository){
        $this->weatherLogsRepository = $weatherLogsRepository;
    }

    /**
     * @Route("/weather/{type}", name="log_state", methods={"POST"})
     * @param Request $request
     * @param $type
     * @return JsonResponse
     */
    public function logTemp(Request $request, $type){

        $data = json_decode($request->getContent(),true);
        $datalog = $data['data'];

        if (empty($datalog)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->weatherLogsRepository->save($type,$datalog);
        return new JsonResponse(['status' => 'Log created!'], Response::HTTP_CREATED);
    }
}