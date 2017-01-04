<div class="row">
    <div class="col-sm-5">
        <h3 class="box-title">Hover Data Table</h3>
    </div>
    <div class="col-sm-7">
        <form action="" method="GET" id="form_search" class="navbar-form navbar-right">
            <div class="input-group">
                <input type="text" name="search"  placeholder="{{trans('title.search')}}" value="{{Request::input('search')}}" class="form-control" />
                <div class="input-group-btn">
                    <button class="btn btn-info btn-search" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>