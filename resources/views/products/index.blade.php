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
                        <th>{{trans('title.category')}}</th>
                        <th>{{trans('title.name')}}</th>
                        <th>{{trans('title.description')}}</th>
                        <th>{{trans('title.quanlity')}}</th>
                        <th>{{trans('title.status')}}</th>
                        <th>{{trans('title.update')}}</th>
                        <th>{{trans('title.delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><a href="{{route('admin.products.index',['categories'=>$product->category->id])}}">{{$product->category->name}}</a></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quanlity}}</td>
                        <td>{{$product->status}}</td>
                        <td><a class="btn btn-default" href="{{route('admin.products.edit',$product->id)}}">{{trans('title.update')}}</a></td>
                        <td>
                            <form method="POST" action="{{route('admin.products.destroy',$product->id)}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" name="_method" value="DELETE"/>
                                <button class="btn btn-danger" type="submit">{{trans('title.delete')}}</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products}}
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection