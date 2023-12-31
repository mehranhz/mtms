<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        try {
            foreach (Permission::all() as $permission) {
                Gate::define($permission->title, function ($user) use ($permission) {
                    if (User::all()->count() == 1) {
                        return true;
                    }
                    return $user->hasPermission($permission);
                });
            }
        } catch (\Exception $exception) {

        }
    }
}
