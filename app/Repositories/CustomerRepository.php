<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class CustomerRepository extends BaseRepository {

    /**
     * 
     * @return type
     */
    public function model() {
        return \App\Entities\Customer::class;
    }

}
