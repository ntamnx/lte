@extends('app')
@section('htmlheader_title')
{{trans('title.addBill')}}
@endsection
@section('css')
@endsection
@section('main-content')
<form method="POST" action="{{route('admin.bills.store')}}" id="frm_add_bill">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    {{trans('title.Customer')}}
                </div>
                <div class="panel-body">
                    <div id="info_customer">
                        <div class="form-group">
                            <label>{{trans('title.username')}}</label>
                            <input type="text" id="username" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{trans('title.name')}}</label>
                            <select name="customer_id" class="form-control">
                                <option>{{trans('title.customer')}}</option>
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}} | {{$customer->address}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{trans('title.phone')}}</label>
                            <input type="text" id="phone" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{trans('title.adrress')}}</label>
                            <input type="text" id="adrress" disabled class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_supply" >{{trans('title.addNewcustomer')}}</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">{{trans('title.product')}}</div>
                <div class="panel-body">
                    <div id="frm-product">
                        <div class="form-group">
                            <label>{{trans('title.name')}}</label>
                            <select id="name_product" class="form-control" data-url="{{route('admin.bills.product')}}">
                                <option value="">{{trans('title.selectProduct')}}</option>
                                @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{trans('title.quanlity')}}</label>
                            <input type="text" id="quanlity" value="1" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>{{trans('title.quanlityStill')}}</label>
                            <input type="text" id="quanlity_still" disabled class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>{{trans('title.price')}}</label>
                            <input type="text" id="price" disabled class="form-control" >
                        </div>
                        <div class="panel-footer">
                            <button type="button" class="btn btn-primary" id="btn_add_product" >{{trans('title.submit')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">{{trans('title.product')}}</div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{trans('title.product')}}</th>
                            <th>{{trans('title.quanlity')}}</th>
                            <th>{{trans('title.price')}}</th>
                            <th>{{trans('title.totalMoney')}}</th>
                            <th>{{trans('title.delete')}}</th>
                        </tr>
                    </thead>
                    <tbody id="content_bill">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
@include('bills.modal_add_supply')
@endsection
@section('js')
{!! JsValidator::make(App\Entities\Supply::$rules,[],[],'#frm-add-supply') !!}
{!! JsValidator::make(App\Entities\Export::$rules,[],[],'#frm_add_bill') !!}
<script src="{{asset('js/bill_export.js')}}"></script>
<script>bill_export.init()</script>
@endsection