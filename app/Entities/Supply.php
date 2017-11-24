<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Supply
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 */
class Supply extends Model {

    /**
     *
     * @var type 
     */
    public static $rules = [
        'name'    => 'required|unique:supplies,name',
        'phone'   => 'required',
        'address' => 'required',
    ];

    /**
     *
     * @var type 
     */
    public $timestamps = false;

    /**
     *
     * @var type 
     */
    public $fillable = [
        'name',
        'phone',
        'address',
    ];

}
