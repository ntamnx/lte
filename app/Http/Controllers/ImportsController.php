<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\ImportRopository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Import;
use App\Repositories\ImportDetailRopository;
use App\Entities\ImportDetail;
use App\Repositories\SupplyRepository;

class ImportsController extends Controller {

    /**
     * 
     */
    protected $importRepository;
    protected $importDetailRepository;
    protected $supplyRepository;

    /**
     * 
     * @param ImportRopository $importRepository
     */
    public function __construct(ImportRopository $importRepository, ImportDetailRopository $importDetailRepository, SupplyRepository $supplyRepository) {
        $this->importRepository       = $importRepository;
        $this->importDetailRepository = $importDetailRepository;
        $this->supplyRepository       = $supplyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $this->importRepository->pushCriteria(new RequestCriteria($request));
        $imports = $this->importRepository->paginate(config('common.page_size'));
        return view('bills.index')
                        ->with('imports', $imports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $supplies = $this->supplyRepository->orderBy('id', 'desc')->all();
        return view('imports.add')
                        ->with('supplies', $supplies);
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
            $this->validate($request, Import::$rules);
            $this->importRepository->create($request->all());
            foreach ($request->importDetail as $importDetail) {
                $this->validate($importDetail, ImportDetail::$rules);
                $this->importDetailRepository->create($importDetail);
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            dd($ex->getMessage());
            return;
        }
        \Session::flash('success', trans('common.CREATE_SUCCESS'));
        return redirect()->route('admin.imports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $import = $this->importRepository->find($id);
        return view('imports.show')
                        ->with('import', $import);
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
        $this->importRepository->delete($id);
        \Session::flash('flash_sucess', trans('common.DELETE_SUCCESS'));
        return redirect()->back();
    }

}
