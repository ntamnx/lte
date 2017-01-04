@extends('app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{trans('title.listCategory')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{trans('title.name')}}</th>
                        <th>{{trans('title.description')}}</th>
                        <th>{{trans('title.update')}}</th>
                        <th>{{trans('title.delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td><a href="{{route('admin.products.index',['categories'=>$category->id])}}">{{$category->name}}</a></td>
                        <td>{{$category->description}}</td>
                        <td><a class="btn btn-default" href="{{route('admin.categories.edit',$category->id)}}">{{trans('title.update')}}</a></td>
                        <td>
                            <form method="POST" action="{{route('admin.categories.destroy',$category->id)}}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">{{trans('title.delete')}}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories}}
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection
