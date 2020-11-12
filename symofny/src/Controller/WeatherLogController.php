<?php


namespace App\Controller;


use App\Service\PowerBiDataPusher;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WeatherLogsRepository;
use Symfony\Component\HttpFoundation\Request;

class WeatherLogController
{

    private $weatherLogsRepository;
    private $powerBiDataPusher;

    public function __construct(WeatherLogsRepository $weatherLogsRepository, PowerBiDataPusher $powerBiDataPusher){
        $this->weatherLogsRepository = $weatherLogsRepository;
    }

    /**
     * @Route("/weather/{type}", name="log_state", methods={"POST"})
     * @param Request $request
     * @param $type
     * @param PowerBiDataPusher $powerBiDataPusher
     * @return JsonResponse
     */
    public function logTemp(Request $request, $type, PowerBiDataPusher $powerBiDataPusher){

        $data = json_decode($request->getContent(),true);
        $datalog = $data['data'];

        if (empty($datalog)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->weatherLogsRepository->save($type,$datalog);
        //$request = $powerBiDataPusher->publishData($datalog,$type);

        return new JsonResponse($request, Response::HTTP_CREATED);
    }
}