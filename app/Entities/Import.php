<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Import
 *
 * @property int $id
 * @property int $suppliers_id
 * @property int $user_id
 * @property float $total_money
 * @property int $status
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at
 
 */
class Import extends Model {

    /**
     *
     * @var type 
     */
    public static $rules = [
        'suppliers_id' => 'required|exits,supplies,id',
        'user_id'      => 'required|exits,users,id',
        'status'       => 'required|numeric|min:-1|max:2',
        'total_money'  => 'total_money|numeric',
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
    public  $fillable = [
        'suppliers_id',
        'user_id',
        'status',
        'total_money',
    ];

}
