@extends('app')
@section('htmlheader_title')
{{trans('title.category')}}
@endsection
@section('css')
<link href="{{ asset('/modules/categories.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')
<div class="row">
    <div class="col-sm-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('title.addCategory')}}</h3>
            </div>
            <form role="form">
                <div class="box-body">
                    <input type="hidden" id="category_id" name="category_id" value=""/>
                    <div class="form-group">
                        <label>{{trans('title.name')}}</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="{{trans('placeholder.enterCategory')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.description')}}</label>
                        <textarea id="description" name="description" rows="10" cols="80">
                        </textarea>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="btn_add">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('title.parentCategories')}}</h3>
            </div>
            <div class="categoriparent">
                <div class="portlet" data-id='1'>
                    <div class="portlet-header">Shopping</div>
                    <div class="portlet-content" style="display: none">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
                </div>
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('title.listCategories')}}</h3>
            </div>
            <div class="column">
                <div class="portlet" data-id='2'>
                    <div class="portlet-header">Links</div>
                    <div class="portlet-content" style="display: none">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
                </div>

                <div class="portlet" data-id='3'>
                    <div class="portlet-header">Images</div>
                    <div class="portlet-content" style="display: none">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('/modules/category.js') }}" type="text/javascript"></script>
<script>app.categories.init()</script>
<script>CKEDITOR.replace('description');</script>
@endsection