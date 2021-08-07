<?php

namespace App\Http\Controllers\API\V1;

use App\Services\AccessTokenService;
use Illuminate\Validation\ValidationException;
use Psr\Http\Message\ServerRequestInterface;

class AuthController extends APIV1Controller
{
    protected $accessTokenService;

    public function __construct(AccessTokenService $accessTokenService)
    {
        $this->accessTokenService = $accessTokenService;
    }

    public function isValid(ServerRequestInterface $request, $rules)
    {
        $messages = [
            'client_id.exists' => 'Invalid client',
            'client_secret.exists' => 'Invalid client',
        ];

        $data = $request->getParsedBody();
        try {
            request()->validate($rules, $messages, $data);
            return $data;
        } catch (ValidationException $exception) {
            throw ValidationException::withMessages($exception->errors());
        }
    }
}