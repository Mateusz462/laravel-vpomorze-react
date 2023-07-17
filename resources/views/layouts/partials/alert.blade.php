@if ($message = Session::get('orig_user'))
    <div class="alert alert-warning fade show mb-4" role="alert">
        <div class="d-flex">
            <span class="text-start">Jesteś aktualnie zalogowany jako {{ auth()->user()->login }}.</span><a href="{{ route('admin.user.switch-stop') }}" class="ms-auto text-end">Wróć na swoje konto</a>
        </div>
        
    </div>
@endif
@if ($message = Session::get('success'))
    <div class="col-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check"></i> {{ $message }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-ban"></i> {{ $message }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
@if($errors->count() > 0)
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="list-unstyled mb-0">
                @foreach($errors->all() as $error)
                    <li class="">{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
