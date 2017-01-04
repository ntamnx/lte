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
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereRoleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\User whereActive($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
