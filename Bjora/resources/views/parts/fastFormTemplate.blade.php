<form method="{{ $method??"POST" }}" style="display: inline" action="/{{ $action }}" enctype="multipart/form-data">
    @csrf

    {{ $slot }}

    <button type="submit" class="btn btn-{{ $color??"primary" }}" style="{{ $additional??"" }}">
        {{ __($button??"FFT") }}
    </button>
</form>