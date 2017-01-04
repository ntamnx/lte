<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Bill
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $customer_id
 * @property string $date_created
 * @property int $total_money
 * @property int $user_id
 * @property int $status
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
    public $timestamps = false;

}
