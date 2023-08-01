<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\UserAbilityModel;
use App\Models\UserClientModel;
use App\Models\UserRoleModel;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

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
        // $this->registerPolicies();

        // // Se si usa php artisan migrate --pretend testi la migration prima di farlo
        // if (Schema::hasTable("userRole")) {
        //     if (app()->environment() !== 'testing') {
        //         // GATE ROLE
        //         UserRoleModel::all()->each( //con each cicliamo tutti i ruoli
        //             function (UserRoleModel $role) {
        //                 Gate::define($role->nome, function (UserClientModel $userClient) use ($role) {
        //                     return $userClient->role->contains('nome', $role->nome);
        //                 });
        //             }
        //         );

        //         // GATE FOR MORE ROLES
        //         UserAbilityModel::all()->each(function (UserAbilityModel $ability) {
        //             Gate::define($ability->power, function (UserClientModel $userClient) use ($ability) {
        //                 $check = false; // setto un check che se nel foreach non succede nulla mi ritornerà false
        //                 foreach ($userClient->role as $item) {
        //                     if ($item->ability->contains('power', $ability->power)) {
        //                         $check = true;
        //                         break; // se trovo l'abilità stoppo il ciclo e vado oltre fermando tutto con il break
        //                     }
        //                 }
        //                 return $check;
        //             });
        //         });
        //     }
        // }
    }
}
