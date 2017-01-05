<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Bill
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $customer_id
 * @property int $total_money
 * @property int $user_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereTotalMoney($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Bill whereUpdatedAt($value)
 */
class Bill extends Model {

    public static $rules = [
        'customer_id' => 'required',
        'user_id'     => 'required',
        'status'      => 'required',
    ];
    /**
     *
     * @var type 
     */
    public $timestamps = true;

}
