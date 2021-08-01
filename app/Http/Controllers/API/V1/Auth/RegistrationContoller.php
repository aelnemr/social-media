<?php

namespace App\Http\Controllers\API\V1\Auth;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationContoller extends Controller
{
    use CoreJsonResponse;

    public function register(RegistrationRequest $request) {
        $user = DB::transaction(function () use ($request) {
            $user = User::create($request->only(['name', 'email', 'password']));
            $user->profile()->create($request->only(['bio']));
            return $user;
        });

        return $this->created((new UserResource($user))->resolve());
    }
}
