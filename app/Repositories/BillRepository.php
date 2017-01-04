<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class BillRepository extends BaseRepository {

    /**
     * 
     * @return type
     */
    public function model() {
        return \App\Entities\Bill::class;
    }

}
