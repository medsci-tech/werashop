<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Shop;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        try {
            foreach ($this->getPermissions() as $permission) {
                for ($shop_id = 1; $shop_id <= Shop::count(); $shop_id++ ) {
                    $gate->define($permission->name.'|'.$shop_id, function (User $user) use ($permission, $shop_id) {
                        return $user->hasRoleInShop($permission->roles(), $shop_id);
                    });
                }
            }
        } catch (QueryException $e) {
            if (\App::environment('local')) {
                echo "Permissions system not work properly, because database not setup correctly. ".PHP_EOL;
                echo "Maybe you have forgot to run the migration command, unless you're now doing this.". PHP_EOL;
                echo "Ignored.". PHP_EOL;
            }
        }
    }

    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
