<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository {

    /**
     *
     * @var type 
     */
    protected $fieldSearchable = [
        'name'        => 'like',
        'description' => 'like'
    ];

    /**
     * 
     * @return string
     */
    public function model() {
        return \App\Entities\Product::class;
    }

}
