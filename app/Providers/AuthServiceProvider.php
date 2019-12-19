<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('canCreate', function ($user)
        {
            if($user->canCreate == 1 || $user->permission_level == 'administrator')
            {
                return true;
            }
            else
            {
                return false;
            }
        });

        Gate::define('canEdit', function ($user, $post)
        {
            if($user->id == $post->user_id || $user->permission_level == 'administrator')
            {
                return true;
            }
            else
            {
                return false;
            }
        });

        Gate::define('canDelete', function ($user, $post)
        {
            if($user->id == $post->user_id || $user->permission_level == 'administrator')
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    }
}
