<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class BillDetailRepository extends BaseRepository {

    /**
     * 
     * @return type
     */
    public function model() {
        return \App\Entities\BillDetail::class;
    }

}
