<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\SupplyRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Supply;

class SuppliesController extends Controller {

    /**
     *
     * @var type 
     */
    protected $supplyRepository;

    /**
     * 
     * @param SupplyRepository $supplyRepository
     */
    public function __construct(SupplyRepository $supplyRepository) {
        $this->supplyRepository = $supplyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $this->supplyRepository->pushCriteria(new RequestCriteria(($request)));
        $supplies = $this->supplyRepository->paginate(config('common.page_size'));
        return view('supplies.index')
                        ->with('supplies', $supplies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('supplies.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, Supply::$rules);
        $this->supplyRepository->create($request->all());
        \Session::flash('flash_success', trans('common.CREATE_SUCCESS'));
        return redirect()->route('admin.supplies.index');
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
        $supply = $this->supplyRepository->find($id);
        return view('supplies.edit')
                        ->with('supply', $supply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $rules = ['name' => 'required|unique:supplies,name,' . $id] + Supply::$rules;
        $this->validate($request, $rules);
        $this->supplyRepository->update($request->all(), $id);
        \Session::flash('flash_success', trans('common.UPDATE_SUCCESS'));
        return redirect()->route('admin.supplies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->supplyRepository->delete($id);
        \Session::flash('flash_success', trans('common.DELETE_SUCCESS'));
        return redirect()->back();
    }

}
