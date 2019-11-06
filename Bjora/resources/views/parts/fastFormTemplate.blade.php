<form method="{{ $method??"POST" }}" action="/{{ $action }}" enctype="multipart/form-data">
    @csrf

    {{ $slot }}

    <button type="submit" class="btn btn-primary">
        {{ __($button??"FFT") }}
    </button>
</form>