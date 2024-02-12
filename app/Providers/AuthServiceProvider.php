<?php

namespace App\Providers;
use App\Models\Comment;
use App\Policies\CommentPolicy;
use App\Models\Monster;
use App\Policies\MonsterPolicy;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Comment::class => CommentPolicy::class,
        Monster::class => MonsterPolicy::class,
        \App\Models\Monster::class => \App\Policies\MonsterPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
