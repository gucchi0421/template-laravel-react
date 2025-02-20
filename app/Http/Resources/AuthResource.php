<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JWTAuth;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user'       => (new UserResource($this->resource['user']))->toArray($request),
            'token'      => $this->resource['token'],
            'token_type' => 'Bearer',
            'expires_in' => JWTAuth::factory()->getTTL()
        ];
    }
}
