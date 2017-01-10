<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class ImportDetailRopository extends BaseRepository {

    /**
     * 
     * @return string
     */
    public function model() {
        return \App\Entities\ImportDetail::class;
    }

}
