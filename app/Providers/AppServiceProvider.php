<?php


namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Aquí puedes mapear modelos a policies si las tenés
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();


        // ============================
        // GATES POR ROL
        // ============================


        // Solo docente
        Gate::define('solo-docente', function ($user) {
            return $user->persona?->esDocente();
        });


        // Solo alumno
        Gate::define('solo-alumno', function ($user) {
            return $user->persona?->esAlumno();
        });
    }
}
