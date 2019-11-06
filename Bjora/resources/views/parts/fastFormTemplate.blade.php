<form method="{{ $method??"POST" }}" action="/{{ $action }}" enctype="multipart/form-data">
    @csrf

    {{ $slot }}

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __($button??"FFT") }}
            </button>
        </div>
    </div>
</form>