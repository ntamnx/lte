@if(Session::has('flash_success'))
<div class="alert alert-success alert-dismissable text-center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    {{ Session::get('flash_success') }}
</div>
@elseif(Session::has('flash_error'))
<div class="alert alert-danger alert-dismissable text-center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    {{ Session::get('message') }}
</div>
@endif