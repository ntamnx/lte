@extends('app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Hover Data Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{trans('title.product')}}</th>
                        <th>{{trans('title.price')}}</th>
                        <th>{{trans('title.sale')}}</th>
                        <th>{{trans('title.date_created')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prices as $price)
                    <tr>
                        <td>{{$price->product->name}}</td>
                        <td>{{$price->price}}</td>
                        <td>{{$price->sale}}</td>
                        <td>{{$price->date_created}}</td>
                        <td><a class="btn btn-default" href="{{route('prices.edit',$price->id)}}">{{trans('title.update')}}</a></td>
                        <td>
                            <form method="Delete" action="{{route('prices.destroy',$category->id)}}">
                                <button type="submit" class="btn btn-danger">{{trans('title.delete')}}</button>
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
