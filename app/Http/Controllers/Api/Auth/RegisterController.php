<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $registerRequest)
    {
        $user = User::create($registerRequest->getData());

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('newsapp_api_token')->plainTextToken
        ]);
    }
}
