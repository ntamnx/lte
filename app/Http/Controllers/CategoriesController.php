<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \App\Repositories\CategoryRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Validator;

class CategoriesController extends Controller {

    /**
     *
     * @var type 
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->paginate(config('common.page_size'));
        return view('categories.index')
                        ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = $this->categoryRepository->all();
        return view('categories.add')
                        ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, \App\Entities\Category::$rules);
        $this->categoryRepository->create($request->all());
        \Session::flash('flash_success', trans('common.CREATE_SUCESS'));
        return redirect(route('admin.categories.index'));
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
        $category   = $this->categoryRepository->find($id);
        $categories = $this->categoryRepository->findWhereNotIn('id', [$category->parent_category_id]);
        return view('categories.edit')
                        ->with('category', $category)
                        ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $rules = ['name' => 'required|max:255|min:6|unique:categories,name,' . $id] + \App\Entities\Category::$rules;
        $this->validate($request, $rules);
        $this->categoryRepository->update($request->all(), $id);
        \Session::flash('flash_success', trans('common.UPDATE_SUCCESS'));
        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->categoryRepository->delete($id);
        \Session::flash('flash_success', trans('common.DELETE_SUCCESS'));
        return \Redirect::back();
    }

}
