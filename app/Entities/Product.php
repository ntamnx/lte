<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Product
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $quanlity
 * @property int $status
 * @property int $category_id
 * @mixin \Eloquent
 * @property string $created_at
 * @property string $updated_at
 * @property-read \App\Entities\Category $category
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereQuanlity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Product whereUpdatedAt($value)
 */
class Product extends Model {

    /**
     *
     * @var type 
     */
    public static $rules = [
        'name'        => 'required|min:6|max:255|unique:products,name',
        'description' => 'required|min:6|max:500',
        'quanlity'    => 'numeric',
        'status'      => 'numeric',
        'category_id' => 'required|exists:categories,id',
    ];

    /**
     *
     * @var type 
     */
    public $timestamps = false;

    /**
     * 
     */
    public $fillable = [
        'name',
        'description',
        'image',
        'quanlity',
        'image',
        'status',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
