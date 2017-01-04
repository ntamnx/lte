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
 */
class Customer extends Model {

    /**
     *
     * @var type 
     */
    public static $rules = [
        'name'    => 'required|max:100|min:6|unique:customers,name',
        'address' => 'required|max:255|min:6',
        'phone'   => 'required|max:15|min:10',
    ];

    /**
     *
     * @var type 
     */
    public $timestamps   = false;

    /**
     *
     * @var type 
     */
    protected $fillable = [
        'name',
        'description',
        'parent_category_id',
    ];

}