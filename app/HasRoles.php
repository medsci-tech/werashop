<?php


namespace App;
use App\Models\Role;


/**
 * Class HasRoles
 * @package App
 */
trait HasRoles
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrfail()
        );
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->contains('name', $role);
        }

        return !! $role->intersect($this->roles())->count();
    }
}