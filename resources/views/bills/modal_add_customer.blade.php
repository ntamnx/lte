<form action="{{route('admin.customers.store')}}" method="POST" id="frm-add-supply" enctype="multipart/form-data">
    <div class="modal fade" id="add_supply" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>{{trans('title.name')}}</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>{{trans('title.phone')}}</label>
                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" >
                            </div>
                            <div class="form-group">
                                <label>{{trans('title.address')}}</label>
                                <input type="text" name="address" class="form-control" value="{{old('address')}}" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" >{{trans('title.create')}}</button>
                </div>
            </div>

        </div>
    </div>
</form>
