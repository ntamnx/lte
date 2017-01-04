<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Import
 *
 * @property int $id
 * @property int $suppliers_id
 * @property int $user_id
 * @property string $date_created
 * @property float $total_money
 * @property int $status
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereSuppliersId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereDateCreated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereTotalMoney($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Import whereStatus($value)
 * @mixin \Eloquent
 */
class Import extends Model {

    /**
     *
     * @var type 
     */
    public $timestamps = false;

}
