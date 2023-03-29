<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserPreference;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $registerRequest)
    {

        $user = User::create($registerRequest->getData());

        $userPreference['user_id'] = $user->id;
        $userPreference['source_id'] = $registerRequest->source_id;
        UserPreference::create($userPreference);

        $user['token'] = $user->createToken('news_api_token')->plainTextToken;
        return UserResource::make($user);
    }
}
