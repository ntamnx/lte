<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $parent_category_id
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at

 */
class Category extends Model {

    /**
     *
     * @var type 
     */
    public static $rules = [
        'name'        => 'required|max:255|min:6|unique:categories,name',
        'description' => 'required|max:255|min:6',
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
    protected $fillable = [
        'name',
        'description',
        'parent_category_id',
    ];

}
