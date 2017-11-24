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
        'customer_id' => 'required|exists:customers,id',
        'user_id'     => 'exits,users,id',
        'status'      => 'numeric|min:-1|max:1',
        'total_money' => 'required|numeric',
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

    /**
     * 
     * @return type
     */
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    /**
     * 
     * @return type
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

}
