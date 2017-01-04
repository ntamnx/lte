<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class UserLoginRepository extends BaseRepository {

    /**
     * 
     * @return type
     */
    public function model() {
        return \App\Entities\UserLogin::class;
    }

}
