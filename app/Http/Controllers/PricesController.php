<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\PriceRepository;
use App\Repositories\ProductRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Criteria\PriceCriteria;
use App\Entities\Price;

//use Validator;

class PricesController extends Controller {

    /**
     *
     * @var type 
     */
    protected $priceRepository;
    protected $productRepository;

    /**
     * 
     */
    public function __construct(PriceRepository $priceRepository, ProductRepository $productRepository) {
        $this->priceRepository   = $priceRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $this->priceRepository->pushCriteria(new PriceCriteria($request));
        $this->priceRepository->pushCriteria(new RequestCriteria($request));
        $prices = $this->priceRepository->paginate(config('common.page_size'));
        $prices->setPath(\URL::current());
        return view('prices.index')
                        ->with('prices', $prices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $products = $this->productRepository->all();
        return view('prices.add')
                        ->with('products', $products);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, Price::$rules);
        $this->priceRepository->create($request->all());
        \Session::flash('flash_success', trans('common.CREATE_SUCCESS'));
        return redirect()->route('admin.prices.index');
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
        $products = $this->productRepository->all();
        $price    = $this->priceRepository->find($id);
        return view('prices.edit')
                        ->with('products', $products)
                        ->with('price', $price);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, Price::$rules);
        $this->priceRepository->update($request->all(), $id);
        \Session::flash('flash_success', trans('common.UPDATE_SUCCESS'));
        return redirect()->route('admin.prices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->priceRepository->delete($id);
        \Session::flash('flash_success', trans('common.DELETE_SUCCESS'));
        return redirect()->back();
    }

}
