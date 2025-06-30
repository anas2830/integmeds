@if(Session::has('success'))
    <div class="success-msg">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissible fade show text-success p-2 small" role="alert">
                <span class="text-sm">
                    <i class="fa-solid fa-circle-check me-1"></i>
                    {{ Session::get('success') }}
                </span>
                </div>
            </div>
        </div>
    </div>
@endif