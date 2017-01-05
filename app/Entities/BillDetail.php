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
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereBillId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereQuanlity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\BillDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BillDetail extends Model {

    protected $table  = 'bill_detail';
    public $timestamp = false;

}
