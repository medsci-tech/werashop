<?php


namespace App;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;


/**
 * Class HasRoles
 * @package App
 * @mixin Model
 */
trait HasRoles
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('shop_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rolesInShop($shop_id)
    {
        return $this->belongsToMany(Role::class)->wherePivot('shop_id', $shop_id)->withPivot('shop_id');
    }

    /**
     * @param $role mixed
     * @param $shop_id int
     * @return $this|Model
     */
    public function assignRole($role, $shop_id = 1)
    {
        if (is_string($role)) {
            return $this->roles()->save(
                Role::whereName($role)->firstOrfail(),
                ['shop_id' => $shop_id]
            );
        }

        if ($role instanceof Role) {
            return $this->roles()->save($role, ['shop_id' => $shop_id]);
        }

        return $this;
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->get()->contains('name', $role);
        }

        return !! $role->intersect($this->roles()->get())->count();
    }

    /**
     * @param $role
     * @param $shop_id int
     * @return bool
     */
    public function hasRoleInShop($role, $shop_id)
    {
        if (is_string($role)) {
            return $this->roles()->wherePivot('shop_id', $shop_id)->get()->contains('name', $role);
        }
        return !! $role->get()->intersect($this->roles()->wherePivot('shop_id', $shop_id)->get())->count();
    }
}