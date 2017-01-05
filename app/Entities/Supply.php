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
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Supply whereUpdatedAt($value)
 */
class Supply extends Model
{
   /**
     *
     * @var type 
     */
    public $timestamps = false;
}
