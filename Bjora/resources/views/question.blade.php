@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
@component('parts.statusMessage')@endcomponent
                    
                    @if ($post == NULL)
                        Question not found...
                    @else
                        You are viewing a specific question!
                        <br>
                        Author: {{ $post['owner'] }}
                        <br>
                        Topic: {{ $post['topic'] }}
                        <br>
                        Question: {{ $post['question'] }}
                        <br>
                        Answers:
                        <br>
                        @foreach ($post['answers'] as $answer)
                            Answerer: {{ $answer->owner->name }}<br>
                            Nigga said: {{ $answer->answer }}<br>
                        @endforeach
                        <br>
                    @endif



                    <form method="POST" action="/answers/add" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Answer') }}</label>
                            <div class="col-md-6">
                                <textarea id="answer" name="answer" class="form-control @error('answer') is-invalid @enderror" rows=3></textarea>
                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="question_id" value="{{ $post['id'] }}">
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
