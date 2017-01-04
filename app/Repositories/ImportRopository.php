<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class ImportRopository extends BaseRepository {

    /**
     * 
     * @return string
     */
    public function model() {
        return \App\Entities\Import::class;
    }

}
