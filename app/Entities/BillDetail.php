<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\BillDetail
 *
 * @property int $id
 * @property int $bill_id
 * @property int $product_id
 * @property int $price
 * @property int $quanlity
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class BillDetail extends Model {

    protected $table = 'bill_detail';

    /**
     *
     * @var type 
     */
    public static $rules = [
        'bill_id'    => 'required|exits,bills,id',
        'product_id' => 'required|exits,products,id',
        'price'      => 'required|numeric',
        'quanlity'   => 'required|numeric',
        'status'     => 'required|numeric|between:-1,2',
    ];

    /**
     *
     * @var type 
     */
    public $timestamp = false;

    /**
     *
     * @var type 
     */
    public $fillable  = [
        'bill_id',
        'product_id',
        'price',
        'quanlity',
        'status',
    ];

}
