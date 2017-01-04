<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository {

    /**
     * 
     * @return type
     */
    public function model() {
        return \App\Entities\User::class;
    }

}
