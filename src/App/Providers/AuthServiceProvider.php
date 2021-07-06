<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Turbine\Auth\Actions\BootComposerProviderAction;
use Turbine\Auth\Actions\BootGateProviderAction;
use Turbine\Auth\Concerns\RegistersAuthLivewireComponents;

class AuthServiceProvider extends ServiceProvider
{
    use RegistersAuthLivewireComponents;
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(
        BootComposerProviderAction $bootComposerProviderAction,
        BootGateProviderAction $bootGateProviderAction
    ) {
        $this->registerPolicies();

        $authViewComposer = ($bootComposerProviderAction)();

        $authGates = ($bootGateProviderAction)();

        Passport::routes();

        Passport::tokensCan([
            'create' => 'Create resources',
            'read' => 'Read Resources',
            'update' => 'Update Resources',
            'delete' => 'Delete Resources',
        ]);

        Passport::setDefaultScope([
            // 'create',
            'read',
            // 'update',
            // 'delete',
        ]);
    }

    public function register()
    {
        $this->registerLivewire();
    }
}
