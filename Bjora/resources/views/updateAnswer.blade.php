@extends('layouts.app')

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

                <div class="card-body">
                    <form method="POST" action="/answers/update/" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Edit Answer') }}</label>

                            <div class="col-md-6">
                                <textarea id="question" name="question" placeholder="{{$post['question']}}" class="form-control @error('question') is-invalid @enderror" rows=3>{{ $post['question'] }}</textarea>

                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="answer_id" value="{{ $post['id'] }}">
                        <input type="hidden" name="question_id" value="{{ $post['question_id'] }}">
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
