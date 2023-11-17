<?php

namespace App\Http\Controllers\Auth;

use App\Services\User\Dto\LoginDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Services\User\Actions\LoginAction;
use App\Http\Resources\User\TokensResource;
use Illuminate\Auth\Access\AuthorizationException;
use Laravel\Passport\Exceptions\OAuthServerException;
use App\Exceptions\User\OauthClientNotFoundException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AuthController extends Controller
{
    /**
     * @throws UnknownProperties
     * @throws AuthorizationException
     * @throws OAuthServerException
     * @throws OauthClientNotFoundException
     */
    public function login(
        LoginRequest $request,
        LoginAction $loginAction,
    ): TokensResource {
        $dto = LoginDTO::fromRequest($request);

        $result =  $loginAction->run($dto);

        return new TokensResource($result);
    }
}
