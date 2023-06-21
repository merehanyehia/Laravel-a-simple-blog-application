<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use App\Policies\BlogPolicy;
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
     Blog::class => BlogPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('update-comment',function(User $user,Comment $comment){
          return $user->id == $comment->user_id;
        });

        Gate::define('delete-comment',function(User $user,Comment $comment){
            return $user->id == $comment->user_id;
          });
    }
}
