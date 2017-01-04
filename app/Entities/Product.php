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
 * @property string $image
 * @property int $status
 * @property int $category_id
 * @mixin \Eloquent
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
        'image'       => 'required|mimes:jpeg,jpg,png|max:1024',
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
