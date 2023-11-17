<?php

namespace App\Providers;

use App\Repositories\Read\User\UserReadRepository;
use App\Repositories\Read\Document\DocumentReadRepository;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Read\OauthClients\OauthClientsReadRepository;
use App\Repositories\Read\Document\DocumentReadRepositoryInterface;
use App\Repositories\Read\OauthClients\OauthClientsReadRepositoryInterface;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserReadRepositoryInterface::class,
            UserReadRepository::class
        );

        $this->app->bind(
            OauthClientsReadRepositoryInterface::class,
            OauthClientsReadRepository::class
        );

        $this->app->bind(
            DocumentReadRepositoryInterface::class,
            DocumentReadRepository::class
        );
    }
}
