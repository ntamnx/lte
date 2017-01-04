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
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                {{trans('title.updateCategory')}}
            </div>

            <div class="panel-body">
                <form action="{{route('admin.categories.update',$category->id)}}" method="POST" id="frm-edit">
                    <input type="hidden" name="_method" value="PUT"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" id="category_id" name="parent_category_id" value="{{$category->parent_category_id}}"/>
                    <div class="form-group">
                        <label>{{trans('title.name')}}</label>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="{{trans('placeholder.enterCategory')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.description')}}</label>
                        <textarea id="description" name="description" rows="10" cols="80">
                                        {{$category->description}}
                        </textarea>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary" id="btn_add">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">{{trans('title.category')}}</div>
            <div class="panel-body">
                <div class="categoriparent">
                    @if($category->parent_category_id != 0)
                    <div class="portlet" data-id='{{$category->parent_category_id}}'>
                        <div class="portlet-header">{{$category->name}}</div>
                        <div class="portlet-content" style="display: none">{{$category->description}}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading text-center">{{trans('title.category')}}</div>
            <div class="panel-body">
                <div class="column">
                    @foreach($categories as $category)
                    <div class="portlet" data-id='{{$category->id}}'>
                        <div class="portlet-header">{{$category->name}}</div>
                        <div class="portlet-content" style="display: none">{{$category->description}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@section('js')
<script src="{{ asset('/modules/category.js') }}" type="text/javascript"></script>
<script>app.categories.init();</script>
<script>CKEDITOR.replace('description');</script>
{!!JsValidator::make(['name' => 'required|max:255|min:6|unique:categories,name,' . $category->id] + App\Entities\Category::$rules  ,[], [], '#frm-edit') !!}
@endsection