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
                        <th>{{trans('title.username')}}</th>
                        <th>{{trans('title.ip')}}</th>
                        <th>{{trans('title.borrow')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loginHistories as $loginHistory)
                    <tr>
                        <td>{{$loginHistory->user->name}}</td>
                        <td>{{$loginHistory->ip}}</td>
                        <td>{{$loginHistory->borrow}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$loginHistories}}
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection