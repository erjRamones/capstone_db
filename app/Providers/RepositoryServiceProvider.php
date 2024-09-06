<?php

namespace App\Providers;

use App\Interface\Repository\CustomerRepositoryInterface;
use App\Interface\Repository\DBLibraryRepositoryInterface;
use App\Interface\Repository\UserRepositoryInterface;
use App\Interface\Repository\PersonalityRepositoryInterface;

use App\Interface\Service\AuthenticationServiceInterface;
use App\Interface\Service\CustomerServiceInterface;
use App\Interface\Service\DBLibraryServiceInterface;
use App\Interface\Service\PersonalityServiceInterface;
use App\Interface\Service\UserServiceInterface;
use App\Repository\CustomerRepository;
use App\Repository\DBLibraryRepository;
use App\Repository\UserRepository;
use App\Repository\PersonalityRepository;

use App\Service\AuthenticationService;
use App\Service\CustomerService;
use App\Service\DBLibraryService;
use App\Service\PersonalityService;
use App\Service\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //Repository
        $this->app->bind(PersonalityRepositoryInterface::class, PersonalityRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(DBLibraryRepositoryInterface::class, DBLibraryRepository::class);
        
        //Service
        
        
        //Service
        $this->app->bind(PersonalityServiceInterface::class, PersonalityService::class);
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);

        $this->app->bind(DBLibraryServiceInterface::class, DBLibraryService::class);
        $this->app->bind(AuthenticationServiceInterface::class, AuthenticationService::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
