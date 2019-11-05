('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Update Question") }}</div>

                @error('owner')
                    <div class="alert alert-danger">
                        You must be logged in.
                    </div>
                @enderror

                @if (session()->has('failure'))
                    <div class="alert alert-danger">
                        {{ session('failure') }}
                    </div>
                @endif

                Page to edit topics
            </div>
        </div>
    </div>
</div>
@endsection
