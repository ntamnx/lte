<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\CustomerRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Customer;

class CustomersController extends Controller {

    /**
     *
     * @var type 
     */
    protected $customerRepository;

    /**
     * 
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository) {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $this->customerRepository->pushCriteria(new RequestCriteria($request));
        $customers = $this->customerRepository->paginate(config('common.page_size'));
        return view('customers.index')
                        ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('customers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, Customer::$rules);
        $this->customerRepository->create($request->all());
        \Session::flash('flash_success', trans('common.CREATE_SUCCESS'));
        return redirect()->route('admin.customers.index');
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
        $customer = $this->customerRepository->find($id);
        return view('customers.edit')
                        ->with('customer', $customer);
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
        $this->validate($request, Customer::$rules);
        $this->customerRepository->update($request->all(), $id);
        \Session::flash('flash_success', trans('UPDATE_SUCCESS'));
        return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->customerRepository->delete($id);
        \Session::flash('flash_success', trans('common.DELETE_SUCCES'));
        return \Redirect::back();
    }

}
