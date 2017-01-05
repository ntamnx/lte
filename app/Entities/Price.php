<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Price
 *
 * @property int $id
 * @property int $product_id
 * @property string $date_created
 * @property float $sale
 * @property int $price
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereId($value)
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereSale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Price whereUpdatedAt($value)
 */
class Price extends Model {

    /**
     *
     * @var type 
     */
    public static $rules = [
        'sale'       => 'required|numeric',
        'price'      => 'required|numeric',
        'product_id' => 'required|exists:products,id',
    ];

    /**
     *
     * @var type 
     */
    protected $dates = ['date_created'];

    /**
     *
     * @var type 
     */
    protected $fillable = [
        'product_id',
        'sale',
        'price',
        'date_created',
    ];

    /**
     *
     * @var type 
     */
    public $timestamps  = true;

}
