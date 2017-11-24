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
                {{trans('title.updatePrice')}}
            </div>
            <div class="panel-body">
                <form action="{{route('admin.prices.update',$price->id)}}" method="POST" id="frm-add" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="form-group">
                        <label>{{trans('title.product')}}</label>
                        <select name="product_id" class="form-control">
                            @foreach($products as $product)
                            <option value="{{$product->id}}" {{$price->product->id == $product->id ?'selected':''}}>{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.price')}}</label>
                        <input type="text" name="price" class="form-control" value="{{isset($price->price) ? $price->price :''}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.sale')}}</label>
                        <input type="text" name="sale" class="form-control" value="{{isset($price->sale) ? $price->sale :''}}" >
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
{!! JsValidator::make(App\Entities\Price::$rules,[],[],'#frm-edit')!!}
@endsection