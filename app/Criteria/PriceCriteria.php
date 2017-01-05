<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class PriceCriteria
 * @package namespace App\Criteria;
 */
class PriceCriteria implements CriteriaInterface {

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
        $product_id = $this->request->get('products');
        if (!isset($product_id)) {
            return $model;
        }
        $model = $model->where('product_id', '=', $product_id);
        return $model;
    }

}
