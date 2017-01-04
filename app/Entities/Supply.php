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
 */
class Supply extends Model
{
   /**
     *
     * @var type 
     */
    public $timestamps = false;
}
