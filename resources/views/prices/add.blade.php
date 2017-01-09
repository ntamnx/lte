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
                <form action="{{route('admin.prices.store')}}" method="POST" id="frm-add" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>{{trans('title.category')}}</label>
                        <select name="product_id" class="form-control">
                            @foreach($products as $product)
                            <option value="{{$product->id}}" {{old('product_id') == $product->id ?'selected':''}}>{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.price')}}</label>
                        <input type="text" name="price" class="form-control" value="{{old('price')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.sale')}}</label>
                        <input type="text" name="sale" class="form-control" value="{{old('sale')}}" >
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
{!! JsValidator::make(App\Entities\Price::$rules,[],[],'#frm-add')!!}
@endsection