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
                {{trans('title.updateCustomer')}}
            </div>
            <div class="panel-body">
                <form action="{{route('admin.customers.update',$customer->id)}}" method="POST" id="frm-edit" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="form-group">
                        <label>{{trans('title.name')}}</label>
                        <input type="text" name="name" class="form-control" value="{{$customer->name}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.phone')}}</label>
                        <input type="text" name="phone" class="form-control" value="{{$customer->phone}}" >
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.address')}}</label>
                        <input type="text" name="address" class="form-control" value="{{$customer->address}}" >
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
{!! JsValidator::make(App\Entities\Customer::$rules,[],[],'#frm-edit')!!}
@endsection