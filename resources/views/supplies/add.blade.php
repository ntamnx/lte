@extends('app')
@section('htmlheader_title')
{{trans('title.supply')}}
@endsection
@section('css')
@endsection
@section('main-content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                {{trans('title.createSupply')}}
            </div>
            <div class="panel-body">
                <form action="{{route('admin.supplies.store')}}" method="POST" id="frm-add" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>{{trans('title.name')}}</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.phone')}}</label>
                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}" >
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.address')}}</label>
                        <input type="text" name="address" class="form-control" value="{{old('address')}}" >
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary" id="btn_add">{{trans('title.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
{!! JsValidator::make(App\Entities\Supply::$rules,[],[],'#frm-add')!!}
@endsection