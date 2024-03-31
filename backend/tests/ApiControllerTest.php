<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiControllerTest extends TestCase
{
    public function testPing()
    {
        $apiController = new \App\Controller\ApiController();

        $this->assertEquals($apiController->ping(), new JsonResponse(['ping' => true], Response::HTTP_OK));
    }
}