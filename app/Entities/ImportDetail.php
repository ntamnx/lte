<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\ImportDetail
 *
 * @property int $id
 * @property int $product_id
 * @property int $quantity
 * @property int $price
 * @property int $import_id
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \Eloquent
 */
class ImportDetail extends Model {

    protected $table = 'import_detail';

    /**
     *
     * @var type 
     */
    public static $rules = [
        'import_id'  => 'required|exits,imports,id',
        'product_id' => 'required|exits,products,id',
        'price'      => 'required|numeric',
        'quantity'   => 'required|numeric',
        'status'     => 'required|numeric|min:-1|max:3',
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
    public $fillable = [
        'import_id',
        'product_id',
        'price',
        'quantity',
        'status',
    ];

}
