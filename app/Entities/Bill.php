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
 */
class Bill extends Model {

    public static $rules = [
        'customer_id' => 'required|exits,customers,id',
        'user_id'     => 'required|exits,users,id',
        'status'      => 'required|numeric|min:-1|max:1',
        'total_money' => 'total_money|numeric',
    ];

    /**
     *
     * @var type 
     */
    public $timestamps = true;

    /**
     * 
     * @return type
     */
    public $fillable = [
        'customer_id',
        'user_id',
        'status',
        'total_money',
    ];

    /**
     * 
     * @return type
     */
    public function billdetails() {
        return $this->hasMany(BillDetail::class);
    }

}
