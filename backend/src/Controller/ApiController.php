<?php

namespace App\Controller;

use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController
{
    /**
     * @OA\Info(title="My First API", version="0.1")
     */

    /**
     * @OA\Get(
     *     path="/api/resource.json",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */

    #[OA\Get(
        path: '/api/ping',
        operationId: 'ping',
        description: 'Pings the service',
        responses: [
            new OA\Response(
                response: 200,
                description: 'Return ping',
                content: new OA\JsonContent(
                    type: 'string',
                    example: 'ping',
                )
            )
        ]
    )]
    #[Route(
        path: '/api/ping',
        name: 'api_ping',
        methods: ['GET'],
    )]
    /**
     * @return JsonResponse
     */
    public function ping(): JsonResponse
    {
        return new JsonResponse(['ping' => true], Response::HTTP_OK);
        //return new JsonResponse(data: 'ping', json: true);
    }
}