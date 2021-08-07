<?php


namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\API\V1\APIV1Controller;
use App\Http\Resources\UserResource;

class UserController extends APIV1Controller
{
    public function profile(): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $user = auth()->user();

        return $this->ok(
            (new UserResource($user))->resolve()
        );
    }
}