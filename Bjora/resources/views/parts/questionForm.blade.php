<form method="POST" action="/questions/{{ $action }}" enctype="multipart/form-data" id="question">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Topic') }}</label>

        <div class="col-md-6">
            <select name="topic" form="question" class="form-control @error('topic') is-invalid @enderror">
                @foreach($topic as $t)
                    <option value="{{ $t->topic }}" @if(($post['topic']??"") == $t->topic) selected @endif>{{ $t->topic }}</option>
                @endforeach
            </select>
            @error('topic')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>

        <div class="col-md-6">
            <textarea id="question" name="question" placeholder="{{$post['question']}}" class="form-control @error('question') is-invalid @enderror" rows=3></textarea>

            @error('question')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>