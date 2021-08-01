<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Resources\UserResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Psr\Http\Message\ServerRequestInterface;

class RegistrationContoller extends AuthController
{
    public function register(ServerRequestInterface $request)
    {
        // validation
        $rules = [
            'grant_type' => 'required',
            'client_id' => 'required|exists:oauth_clients,id',
            'client_secret' => 'required|exists:oauth_clients,secret',
            'name' => 'required|string',
            'username' => 'required|unique:users,email|email',
            'password' => 'required|min:8|string|confirmed',
            'bio' => 'nullable|string',
        ];
        $data = $this->isValid($request, $rules);

        // add user to DB
        $data['email'] = $data['username'];
        $user = DB::transaction(function () use ($request, $data) {
            $user = \App\Models\User::query()->create(
                Arr::only($data, ['name', 'email', 'password'])
            );
            $user->profile()->create(
                Arr::only($data, ['bio'])
            );
            return $user;
        });

        // get token
        $response = $this->accessTokenService->issueToken($request);
        $tokenData = json_decode($response->getContent(), true);
        $tokenData['user'] = new UserResource($user);
        return $this->ok($tokenData);
    }
}
