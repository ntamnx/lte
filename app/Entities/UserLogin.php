<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\UserLogin
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $borrow
 * @property string $created_at
 * @property string $updated_at
 */
class UserLogin extends Model {

    protected $table = 'user_login';

    /**
     *
     * @var type 
     */
    public $timestamps = true;

}
