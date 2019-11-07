@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Answer</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    <form method="POST" action="/answers/update/" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Edit Answer') }}</label>

                            <div class="col-md-6">
                                <textarea id="answer" name="answer" placeholder="{{$answer['answer']}}" class="form-control @error('answer') is-invalid @enderror" rows=3>{{ $answer['answer'] }}</textarea>

                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="answer_id" value="{{ $answer['id'] }}">
                        <input type="hidden" name="question_id" value="{{ $answer['question_id'] }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
