<form method="POST" novalidate action="/topics/{{ $action }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="topic" class="col-md-4 col-form-label text-md-right">{{ __('Topic Name') }}</label>
        <div class="col-md-6">
            <input id="topic" type="text" class="form-control @error('topic') is-invalid @enderror" name="topic" value="{{ $topic['topic']??"" }}" required autocomplete="name" autofocus>
            @error('topic')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{ $slot }}

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>