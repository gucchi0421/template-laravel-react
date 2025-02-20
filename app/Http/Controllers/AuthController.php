<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\NotContentResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /**
     * 新規ユーザー作成
     *
     * 新規ユーザーを作成し、ユーザー情報とトークンを返却します。
     *
     * @unauthenticated
     */
    public function register(AuthRegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $jwtAuth = app('tymon.jwt.auth');
        $token = $jwtAuth->fromUser($user);

        return response()->json(
            new AuthResource([
                'user'  => $user,
                'token' => $token,
            ]),
            201
        );
    }

    /**
     * ログイン
     *
     * ログイン認証を行い、ユーザー情報とトークンを返却します。
     *
     * @unauthenticated
     */
    public function login(AuthLoginRequest $request): JsonResponse
    {
        $jwtAuth = app('tymon.jwt.auth');
        if (! $token = $jwtAuth->attempt($request->only('email', 'password'))) {
            return response()->json(
                new ErrorResource([
                    'message' => 'Invalid credentials',
                    'status' => 401
                ]),
                401
            );
        }

        return response()->json(
            new AuthResource([
                'user'  => auth('api')->user(),
                'token' => $token,
            ]),
            200
        );
    }

    /**
     * 認証ユーザー情報
     *
     * 認証中のユーザー情報を返却します。
     */
    public function me(): JsonResponse
    {
        return response()->json(new UserResource(auth('api')->user()), 200);
    }

    /**
     * ログアウト
     *
     * 認証中のユーザーをログアウトします。
     */
    public function logout(): JsonResponse
    {
        $jwtAuth = app('tymon.jwt.auth');
        if (! $token = $jwtAuth->getToken()) {
            return response()->json(
                new ErrorResource([
                    'message' => 'Token not provided',
                    'status' => 400
                ]),
                400
            );
        }

        $jwtAuth->setToken($token)->invalidate(true);

        return response()->json(new NotContentResource(['Logged out seccessfully']), 200);
    }
}
