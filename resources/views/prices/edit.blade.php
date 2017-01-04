@extends('app')
@section('htmlheader_title')
{{trans('title.category')}}
@endsection
@section('css')
<style>
    body {
        min-width: 520px;
    }
    .column {
        width: 100%;
        padding-bottom: 10px;
        padding-left:  5%;
    }
    .categoriparent {
        width: 100%;
        padding-left: 5%;
        border-bottom: 5px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
        max-height: 120px;
        overflow: hidden;
    }
    .portlet {
        margin: 0 1em 1em 0;
        padding: 0.3em;
    }
    .portlet-header {
        padding: 0.2em 0.3em;
        margin-bottom: 0.5em;
        position: relative;
    }
    .portlet-toggle {
        position: absolute;
        top: 50%;
        right: 0;
        margin-top: -8px;
    }
    .portlet-content {
        padding: 0.4em;
    }
    .portlet-placeholder {
        border: 1px dotted black;
        margin: 0 1em 1em 0;
        height: 50px;
    }
</style>
@endsection
@section('main-content')
<div class="row">
    <div class="col-sm-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div>
            <form role="form">
                <div class="box-body">
                    <input type="hidden" id="category_id" name="category_id" value="0"/>
                    <div class="form-group">
                        <label>{{trans('title.name')}}</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="{{trans('placeholder.enterCategory')}}">
                    </div>
                    <div class="form-group">
                        <label>{{trans('title.description')}}</label>
                        <textarea id="description" name="description" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                        </textarea>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Check me out
                        </label>
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
                <h3 class="box-title">Quick Example</h3>
            </div>
            <div class="categoriparent">
                <div class="portlet" data-id='1'>
                    <div class="portlet-header">Shopping</div>
                    <div class="portlet-content" style="display: none">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
                </div>
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
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
<script>
    $(function () {
        $('#btn_add').click(function (e) {
            e.preventDefault();
            var categories_id = $('.categoriparent').find('.portlet').data('id');
            $('#category_id').val(categories_id);
            $(this).closest('form').submit();
        });

        $(".column").sortable({
            connectWith: ".categoriparent",
            stop: function (evt, ui) {
                $('#category_id').val(ui.item.data('id'));
            }
        });
        $(".categoriparent").sortable({
            connectWith: ".column",
            receive: function (event, ui) {
                if ($(this).children().length > 1) {
                    $(ui.sender).sortable('cancel');
                    alert('on cate gories');
                }
            },
        }).disableSelection();
        $(".portlet")
                .addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
                .find(".portlet-header")
                .addClass("ui-widget-header ui-corner-all")
                .prepend("<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
        $(".portlet-toggle").on("click", function () {
            var icon = $(this);
            icon.toggleClass("ui-icon-minusthick ui-icon-plusthick");
            icon.closest(".portlet").find(".portlet-content").toggle();
        });
    });
      CKEDITOR.replace('description');
    //bootstrap WYSIHTML5 - text editor
//    $(".textarea").wysihtml5();
</script>
@endsection