<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class ProductCriteria
 * @package namespace App\Criteria;
 */
class ProductCriteria implements CriteriaInterface {

    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository) {
        $category_id = $this->request->get('categories');
        if (!isset($category_id)) {
            return $model;
        }
        $model = $model->where('category_id','=', $category_id);
        return $model;
    }

}
