<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Criteria\ProductCriteria;
use App\Entities\Product;
use \App\Repositories\ProductRepository;
use \App\Repositories\CategoryRepository;

class ProductsController extends Controller {
    /**
     *
     * @var type 
     */
    private $productRepository;
    private $categoryRepository;

    /**
     * 
     * @param \App\Repositories\ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository) {
        $this->productRepository  = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $this->productRepository->pushCriteria(new ProductCriteria($request));
        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->paginate(config('common.page_size'));
        $products->setPath(\URL::current());
        return view('products.index')
                        ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = $this->categoryRepository->all();
        return view('products.add')
                        ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, Product::$rules);
        pr($request->all());
        $this->productRepository->create($request->all());
        \Session::flash('flash_sucess', trans('common.CREATE_SUCESS'));
        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
