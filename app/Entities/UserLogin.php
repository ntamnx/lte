<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\UserLogin
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $date_login
 * @property string $ip
 * @property string $borrow
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereDateLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\UserLogin whereBorrow($value)
 */
class UserLogin extends Model {

    protected $table   = 'user_login';

    /**
     *
     * @var type 
     */
    public $timestamps = false;

}
