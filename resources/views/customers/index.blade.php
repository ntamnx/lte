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
                        <th>{{trans('title.name')}}</th>
                        <th>{{trans('title.address')}}</th>
                        <th>{{trans('title.phone')}}</th>
                        <th>{{trans('title.update')}}</th>
                        <th>{{trans('title.delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->phone}}</td>
                        <td><a class="btn btn-default" href="{{route('admin.customers.edit',$customer->id)}}">{{trans('title.update')}}</a></td>
                        <td>
                            <form method="POST" action="{{route('admin.customers.destroy',$customer->id)}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" name="_method" value="DELETE"/>
                                <button class="btn btn-danger" type="submit">{{trans('title.delete')}}</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$customers}}
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection