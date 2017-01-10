<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\BillRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Bill;
use App\Repositories\BillDetailRepository;

class BillsController extends Controller {

    /**
     *
     * @var type 
     */
    protected $billRepository;
    protected $billDetailRepository;

    /**
     * 
     * @param BillRepository $billRepository
     */
    public function __construct(BillRepository $billRepository, BillDetailRepository $billDetailRepository) {
        $this->billRepository = $billRepository;
        $this->billDetailRepository = $billDetailRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $this->billRepository->pushCriteria(new RequestCriteria($request));
        $bills = $this->billRepository->paginate(config('common.page_size'));
        return view('bills.index')
                        ->with('bills', $bills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('bill.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $this->validate($request, Bill::$rules);
            $this->billRepository->create($request->all());
            foreach ($request->billDetail as $billDetail) {
                $this->validate($billDetail, BillDetail::$rules);
                $this->billDetailRepository->create($billDetail);
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            dd($ex->getMessage());
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

}
