@extends('app')
@section('htmlheader_title')
{{trans('title.category')}}
@endsection
@section('css')
@endsection
@section('main-content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                {{trans('title.createProduct ')}}
            </div>
            <div class="panel-body">
                <form action="{{route('admin.products.store')}}" method="POST" id="frm-add" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="form-group">
                        <label>{{trans('title.category')}}</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.name')}}</label>
                        <input type="text" name="name" class="form-control"  placeholder="{{trans('placeholder.enterCategory')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.quanlity')}}</label>
                        <input type="text" name="quanlity" class="form-control"  placeholder="{{trans('placeholder.enterCategory')}}">

                    </div>
                    <div class="form-group">
                        <label>{{trans('title.description')}}</label>
                        <textarea id="description" name="description" id="description" rows="10" cols="80">
                                        {{trans('placeholder.enterDescription')}}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>{{trans('title.image')}}</label>
                        <input id="input-2" name="image[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary" id="btn_add">{{trans('title.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>CKEDITOR.replace('description');</script>
{!! JsValidator::make(App\Entities\Product::$rules,[],[],'#frm-add')!!}
@endsection