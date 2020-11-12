<?php


namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PowerBiDataPusher
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    public function publishData($data,$type) :array
    {
        $dateTime = new \DateTime('now');

        if ($type == 'temp') $data = ['temp' => $data, 'humidity' => '', 'datetime' => $dateTime->format('Y-m-d H:i:s')];
        if ($type == 'hum') $data = ['humidity' => $data, 'temp' => '', 'datetime' => $dateTime->format('Y-m-d H:i:s')];

        $this->makeRequest(json_encode($data,true));

        return $data;
    }


    public function makeRequest($data){

        try {
            $response = $this->client->request('POST',
                'https://api.powerbi.com/beta/125371c9-a99f-4683-b1c0-890bb4fa41a6/datasets/2b55fa2a-b797-4b2a-8b5a-af17cfab97ac/rows?noSignUpCheck=1&key=vrz30liNaaVApIL7rodX5Lhe3Sx0B2YBuTA5lSbMrDCO9SS0B52WJfaLKGDbVcK%2FTBrQrApMvJ1bOpDBOnbSVQ%3D%3D', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                    'body' => '[' . $data . ']',

                ]);
        } catch (TransportExceptionInterface $e) {

        }

        return null;
    }
}