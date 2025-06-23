@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>Error!</strong> {{ session()->get('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
