<?php

namespace App\Services\User\Actions;

use App\Services\User\Dto\LoginDTO;
use Illuminate\Auth\Access\AuthorizationException;
use Laravel\Passport\Exceptions\OAuthServerException;
use App\Exceptions\User\OauthClientNotFoundException;

class LoginAction extends ParentAuthAction
{
    /**
     * @throws AuthorizationException
     * @throws OAuthServerException
     * @throws OauthClientNotFoundException
     */
    public function run(LoginDTO $dto): array
    {
        $this->init($dto);

        $this->createServerRequest();

        $this->getPassportCredentials();

        $this->withParsedBodyToServerRequest();

        $this->createAuthenticationToken();

        return $this->tokenData;
    }

    private function init(LoginDTO $dto): void
    {
        $this->dto = $dto;
        $this->user = $this->userReadRepository->getByEmail($this->dto->email);
    }
}
