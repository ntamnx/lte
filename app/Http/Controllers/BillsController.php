<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\BillRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Bill;
use App\Repositories\BillDetailRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\ProductRepository;
use App\Entities\BillDetail;
use DB;

class BillsController extends Controller {

    /**
     *
     * @var type 
     */
    protected $billRepository;
    protected $billDetailRepository;
    protected $customerRepository;
    protected $productRepository;

    /**
     * 
     * @param BillRepository $billRepository
     */
    public function __construct(BillRepository $billRepository, BillDetailRepository $billDetailRepository, CustomerRepository $customerRepository, ProductRepository $productRepository) {
        parent::__construct();
        $this->billRepository       = $billRepository;
        $this->billDetailRepository = $billDetailRepository;
        $this->customerRepository   = $customerRepository;
        $this->productRepository    = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $this->billRepository->pushCriteria(new RequestCriteria($request));
        $bills = $this->billRepository->orderBy('id')->paginate(config('common.page_size'));
        return view('bills.index')
                        ->with('bills', $bills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $customers = $this->customerRepository->orderBy('id', 'desc')->all();
        $products  = $this->productRepository->orderBy('id', 'desc')->all();

        return view('bills.add')
                        ->with('products', $products)
                        ->with('customers', $customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        dd($request->all());
        DB::beginTransaction();
        try {
            $this->validate($request, Bill::$rules);
//            $bill = $this->billRepository->create([
//                'user_id'     => \Auth::user()->id,
//                'customer_id' => $request->customer_id,
//                'total_money' => $request->total_money,
//            ]);
            dd($request->all());
            foreach ($request->billDetail as $billDetail) {

                $this->validate($billDetail, BillDetail::$rules);
                $this->billDetailRepository->create(array_merge($billDetail, ['bill_id' => $bill->id]));
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
//            dd($ex->getMessage());
            return;
        }
        \Session::flash('flash_success', trans('common.CREATE_SUCCESS'));
        return redirect()->route('admin.imports.index');
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
        $bill = $this->billRepository->find($id);
        return view('bill.edit')
                        ->with('bill', $bill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request->all(), Bill::$rules);
        $this->billRepository->update($request->all(), $id);
        \Session::flash('flash_success', trans('common.UPPDATE_SUCCESS'));
        return round('admin.bill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->billRepository->delete($id);
        \Session::flash('flash_success', trans('common.DELETE_SUCCESS'));
    }

    /**
     * Function get product by id
     */
    public function product(Request $request) {
        $id      = $request->idProduct;
        $product = $this->productRepository->with(['prices' => function ($query) {
                        $query->orderBy('id', 'desc');
                        $query->first();
                    }])->find($id);
        return [
            'quanlityStill' => $product->quanlity,
            'price'         => intval($product->prices[0]->price - ($product->prices[0]->price / 100 * $product->prices[0]->sale)),
        ];
    }

}
