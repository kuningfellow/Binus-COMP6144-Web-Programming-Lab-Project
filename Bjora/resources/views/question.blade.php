@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $question->question??"" }}</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    
                    @if ($question == NULL)
                        Question not found...
                    @else
                        <div style="margin-bottom: 30px; padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 20px; box-shadow: 10px 10px #acc4da; background-color: #edf4fa">
                        <div class="col-mid-10" style="margin-bottom: 20px">
                            {{$question->topic }}
                            @if ($question->status == "open")
                                <span style="text-align:center;width:55px;height:23px;border-radius:15px;float:right;background-color: #11e04f; color: #557686">Open</span>
                            @else
                                <span style="text-align:center;width:55px;height:23px;border-radius:15px;float:right;background-color: #fd4646; color: #8f1515">Closed</span>
                            @endif
                            <br>
                            <span style="font-size: 1.5em">
                            <a href="/questions/{{$question->id}}">{{$question->question}}</a>
                            </span>
                            <span style="float:right">{{ $question->answers->count() }}@if($question->answers->count()!=1) answers @else answer @endif</span>
                            <div class="col-mid-10" style="margin-bottom: 90px">
                                <span class="col-form-label text-md-left" style="float: left;">
                                    @component('parts.PP', ['user' => $question->owner, 'size' => '70px', 'radius' => '100%'])@endcomponent
                                </span>
                                <span class="col-md-4 col-form-label text-md-left" style="float: left;">
                                    <a class="nav-item" href="/users/{{ $question->owner->id??"" }}">{{ $question->owner->name??"" }}</a>
                                    <br>
                                    {{ $question->created_at }}
                                </span>
                            </div>
                            @if (Auth::user() && Auth::user()->id == ($question->owner_id??""))
                                @component('parts.fastFormTemplate', ['action' => 'questions/update', 'button' => 'Update', 'method' => 'GET', 'color' => 'secondary'])
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                @endcomponent
                                @component('parts.fastFormTemplate', ['action' => 'questions/close', 'button' => 'Close', 'color' => 'warning'])
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                @endcomponent
                                @component('parts.fastFormTemplate', ['action' => 'questions/delete', 'button' => 'Delete', 'color' => 'danger'])
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                @endcomponent
                            @endif
                        </div>
                        <div style="padding-left: 30px">
                        <br>
                        @foreach ($question['answers'] as $answer)
                            <div style="margin-bottom: 30px; padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 20px; box-shadow: 10px 7px #9bacc4; background-color: #d3ddec">
                            <div class="col-mid-10" style="margin-bottom: 90px">
                                <span class="col-form-label text-md-left" style="float: left;">
                                    @component('parts.PP', ['user' => $answer->owner, 'size' => '70px', 'radius' => '100%'])@endcomponent
                                </span>
                                <span class="col-md-4 col-form-label text-md-left" style="float: left;">
                                    <a class="nav-item" href="/users/{{ $answer->owner->id??"" }}">{{ $answer->owner->name??"" }}</a>
                                    <br>
                                    Answered at: {{ $answer->created_at }}
                                </span>
                                <span style="float: right; visibility: @if(Auth::user() && Auth::user()->id == ($answer->owner->id??"")) visible @else hidden @endif">
                                    @component('parts.fastFormTemplate', ['action' => 'answers/update', 'method' => 'GET', 'button' => 'Update', 'color' => 'secondary'])
                                        <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    @endcomponent
                                    @component('parts.fastFormTemplate', ['action' => 'answers/delete', 'button' => 'Delete', 'color' => 'danger'])
                                        <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    @endcomponent
                                </span>
                            </div>
                            {{-- <div style="padding-bottom: 50px"> --}}
                                Nigga said: {{ $answer->answer }}
                            {{-- </div> --}}
                            </div>
                        @endforeach
                        </div>
                        <br>
                        @if($question->status == 'open' && Auth::user())
                            <form method="POST" action="/answers/add" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <textarea id="answer" name="answer" class="form-control @error('answer') is-invalid @enderror" rows=8></textarea>
                                        @error('answer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="question_id" value="{{ $question['id'] }}">
                                    <div class="col-md-10 text-md-left" style="padding-top: 20px">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Answer') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
