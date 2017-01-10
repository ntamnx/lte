<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

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
 */
class Product extends Model implements HasMedia {

    use HasMediaTrait;

    /**
     *
     * @var type 
     */
    public static $rules = [
        'name'        => 'required|min:6|max:255|unique:products,name',
        'description' => 'required|min:6|max:500',
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
        'quanlity',
    ];

    /**
     * 
     * @return type
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

}
