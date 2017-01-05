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
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Customer whereUpdatedAt($value)
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
    public $timestamps   = true;

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
