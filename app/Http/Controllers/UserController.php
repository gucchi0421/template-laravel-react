<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\NotContentResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController
{
    /**
     * 全ユーザー取得
     *
     * 全ユーザーを取得します。
     *
     * @unauthenticated
     */
    public function list(): JsonResponse
    {
        $user = User::all();
        return response()->json(UserResource::collection($user), 200);
    }

    /**
     * ユーザー取得
     *
     * ユーザーIDに一致するユーザーを取得します。
     *
     * @unauthenticated
     */
    public function show(User $user): JsonResponse
    {
        return response()->json(new UserResource($user), 200);
    }

    /**
     * ユーザー更新
     *
     * ユーザーIDに一致するユーザーを更新します。
     */
    public function update(UserUpdateRequest $request, User $user): JsonResponse
    {
        if (! $user->fill($request->all())->save()) {
            return response()->json(
                new ErrorResource([
                    'message' => 'User not found',
                    'status' => 404
                ]),
                404
            );
        }
        return response()->json(new UserResource($user), 200);
    }

    /**
     * ユーザー削除
     *
     * ユーザーIDに一致するユーザーを削除します。
     */
    public function destroy(User $user): JsonResponse
    {
        if (! $user->delete()) {
            return response()->json(
                new ErrorResource([
                    'message' => 'User not found',
                    'status' => 404
                ]),
                404
            );
        }
        return response()->json(new NotContentResource(['User deleted successfully']), 200);
    }
}
