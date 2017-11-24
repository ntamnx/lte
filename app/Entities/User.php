<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Entities\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $role_id
 * @property int $active
 * @mixin \Eloquent
 */
class User extends Authenticatable {

    /**
     *
     * @var type 
     */
    protected $rules = [
        'name'     => 'required',
        'email'    => 'required|unique,users,email|email',
        'password' => 'required',
        'role_id'  => 'required',
        'active'   => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'role_id' => 'required',
        'active'  => 'required',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
