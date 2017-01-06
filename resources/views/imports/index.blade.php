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
                        <th>{{trans('title.customer')}}</th>
                        <th>{{trans('title.user')}}</th>
                        <th>{{trans('title.status')}}</th>
                        <th>{{trans('title.totalMoney')}}</th>
                        <th>{{trans('title.dateCreate')}}</th>
                        <th>{{trans('title.show')}}</th>
                        <th>{{trans('title.update')}}</th>
                        <th>{{trans('title.delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($imports as $import)
                    <tr>
                        <td><a href="{{route('admin.imports.index',['products'=>$price->product->id])}}">{{$price->product->name}}</a></td>
                        <td>{{$import->supply->name}}</td>
                        <td>{{$import->user->name}}</td>
                        <td>{{$bill->status}}</td>
                        <td>{{$price->total_money}}</td>
                        <td>{{$price->created_date}}</td>
                        <td><a class="btn btn-default" href="{{route('admin.imports.show',$bill->id)}}">{{trans('title.show')}}</a></td>
                        <td><a class="btn btn-default" href="{{route('admin.imports.edit',$bill->id)}}">{{trans('title.update')}}</a></td>
                        <td>
                            <form method="POST" action="{{route('admin.bills.destroy',$bill->id)}}">
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