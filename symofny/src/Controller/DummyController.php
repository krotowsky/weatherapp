<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DummyController
{
    /**
     * @Route("/dummy")
     */
    public function dummy(): Response
    {
        $request = Request::createFromGlobals();
        return new Response($request->headers,Response::HTTP_BAD_REQUEST);
    }
}