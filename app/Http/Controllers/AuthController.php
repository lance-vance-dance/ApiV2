<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function AuthUser(AuthRequest $request)
    {
        $credentials = $request->only('login', 'password');
        if (!$token = $this->getAuthFacade()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function FetchUserSession()
    {
        return response()->json($this->getAuthFacade()->user());
    }

    private function getAuthFacade()
    {
        return auth('api');
    }

    private function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->getAuthFacade()->factory()->getTTL() * 60
        ]);
    }
}
