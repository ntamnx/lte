<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository {

    /**
     *
     * @var type 
     */
    protected $fieldSearchable = [
        'title',
        'description'
    ];

    /**
     * 
     * @return type
     */
    public function model() {
        return \App\Entities\Category::class;
    }

}
