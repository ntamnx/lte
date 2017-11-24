@extends('app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            @include('partials.header_list')
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{trans('title.product')}}</th>
                        <th>{{trans('title.price')}}</th>
                        <th>{{trans('title.sale')}}</th>
                        <th>{{trans('title.dateCreate')}}</th>
                        <th>{{trans('title.dateUpdate')}}</th>
                        <th>{{trans('title.update')}}</th>
                        <th>{{trans('title.delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prices as $price)
                    <tr>
                        <td><a href="{{route('admin.prices.index',['products'=>$price->product->id])}}">{{$price->product->name}}</a></td>
                        <td>{{$price->price}}</td>
                        <td>{{$price->sale}}</td>
                        <td>{{$price->created_at}}</td>
                        <td>{{$price->updated_at}}</td>
                        <td><a class="btn btn-default" href="{{route('admin.prices.edit',$price->id)}}">{{trans('title.update')}}</a></td>
                        <td>
                            <form method="POST" action="{{route('admin.prices.destroy',$price->id)}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" name="_method" value="DELETE"/>
                                <button class="btn btn-danger" type="submit">{{trans('title.delete')}}</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$prices}}
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection