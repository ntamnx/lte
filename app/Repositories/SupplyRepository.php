<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class SupplyRepository extends BaseRepository {

    /**
     * 
     * @return type
     */
    public function model() {
        return \App\Entities\Supply::class;
    }

}
