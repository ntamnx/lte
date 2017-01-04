<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class PriceRepository extends BaseRepository {

    /**
     * 
     * @return type
     */
    public function model() {
        return \App\Entities\Price::class;
    }

}
