<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Customer
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at
 */
class Customer extends Model {

    /**
     *
     * @var type 
     */
    public static $rules = [
        'name'    => 'required',
        'address' => 'required|max:255|min:6',
        'phone'   => 'required|max:15|min:10',
    ];

    /**
     *
     * @var type 
     */
    public $timestamps = true;

    /**
     *
     * @var type 
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

}
