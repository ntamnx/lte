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
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereImportId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ImportDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ImportDetail extends Model {

    protected $table  = 'import_detail';
    public $timestamp = false;

}
