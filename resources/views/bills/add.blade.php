@extends('app')
@section('htmlheader_title')
{{trans('title.category')}}
@endsection
@section('css')
@endsection
@section('main-content')
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                {{trans('title.Customer')}}
            </div>
            <div class="panel-body">
                <form action="{{route('admin.categories.store')}}" method="POST" id="frm-add">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" id="category_id" name="parent_category_id" />
                    <div class="form-group">
                        <label>{{trans('title.name')}}</label>
                        <input type="text" name="name" class="form-control"  placeholder="{{trans('placeholder.enterCategory')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.description')}}</label>
                        <textarea id="description" name="description" rows="10" cols="80">
                                        {{trans('placeholder.enterDescription')}}
                        </textarea>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary" id="btn_add">{{trans('title.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">{{trans('title.product')}}</div>
            <div class="panel-body">
                <form action="/" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" id="category_id" name="parent_category_id" />
                    <div class="form-group">
                        <label>{{trans('title.name')}}</label>
                        <input type="text" name="name" class="form-control"  placeholder="{{trans('placeholder.enterCategory')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.quanlity')}}</label>
                        <input type="text" name="quanlity" class="form-control"  placeholder="{{trans('placeholder.enterCategory')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.quanlityStill')}}</label>
                        <input type="text" name="quanlity_still" class="form-control"  placeholder="{{trans('placeholder.enterCategory')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.price')}}</label>
                        <input type="text" name="price" class="form-control"  placeholder="{{trans('placeholder.enterCategory')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.description')}}</label>
                        <textarea id="description" name="description" rows="10" cols="80">
                                        {{trans('placeholder.enterDescription')}}
                        </textarea>
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary" >{{trans('title.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<div class="col-sm-12">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">{{trans('title.product')}}</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{trans('title.product')}}</th>
                        <th>{{trans('title.quanlity')}}</th>
                        <th>{{trans('title.price')}}</th>
                        <th>{{trans('title.totalMoney')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
{!! JsValidator::make(App\Entities\Bill::$rules + App\Entities\BillDetail::$rules,[],[],'#frm-add')!!}
@endsection