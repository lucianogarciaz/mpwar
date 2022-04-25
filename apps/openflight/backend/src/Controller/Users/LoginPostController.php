<?php

declare(strict_types=1);

namespace CodelyTv\Apps\OpenFlight\Backend\Controller\Users;

use CodelyTv\Shared\Domain\DomainError;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class LoginPostController
{
    public function __construct()
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            return new JsonResponse("OK", Response::HTTP_ACCEPTED);
        } catch (DomainError $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

}