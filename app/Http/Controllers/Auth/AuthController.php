<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\{RegisterFormRequest, LoginFormRequest};
use Tymon\JWTAuth\Exceptions\{JWTException};

class AuthController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = $this->auth->attempt($credentials)) {
                return response()->json([
                    'errors' => [
                        'root' => 'Could not log you in with those details.'
                    ]
                    ], 401);
            }
        } catch(JWTException $e) {
            return response()->json([
                'errors' => [
                    'root' => 'Failed.'
                ]
            ], 401);
        }

        return response()->json([
            'data' => $request->user(),
            'meta' => [
                'token' => $token
            ]
            ], 200);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */ 

    public function register(RegisterFormRequest $request)
    {
        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]); 
        
        $credentials = $request->only('email', 'password');
        $token = auth()->attempt($credentials);

        return response()->json([
            'data' => $user,
            'meta' => [
                'token' => $token
            ]
            ], 200);
    }

    public function logout()
    {
        $this->auth->invalidate($this->auth->getToken());

        return response(null, 200);
    }

}
