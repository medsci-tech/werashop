<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasRoles;
    use HasShops;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
