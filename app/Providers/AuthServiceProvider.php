<?php

namespace App\Providers;

use App\Models\Pkl;
use App\Models\Guru;
use App\Models\Role;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Industri;
use App\Policies\PklPolicy;
use App\Policies\GuruPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\SiswaPolicy;
use App\Policies\IndustriPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\Siswa::class => \App\Policies\SiswaPolicy::class,
        \App\Models\Guru::class => \App\Policies\GuruPolicy::class,
        \App\Models\Pkl::class => \App\Policies\PklPolicy::class,
        \App\Models\Industri::class => \App\Policies\IndustriPolicy::class,
        \Spatie\Permission\Models\Role::class => \App\Policies\RolePolicy::class, // kalau kamu buat custom
    ];
    

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
