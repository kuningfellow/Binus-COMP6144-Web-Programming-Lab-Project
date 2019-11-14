@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Manage Questions</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    @foreach ($question as $q)
                    <div class="col-mid-10" style="margin-bottom: 20px">
                        <div style="margin-bottom: 30px; padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 20px; box-shadow: 10px 10px #acc4da; background-color: #edf4fa">
                        {{$q->topic }}
                        @if ($q->status == "open")
                            <span style="text-align:center;width:55px;height:23px;border-radius:15px;float:right;background-color: #11e04f; color: #557686">Open</span>
                        @else
                            <span style="text-align:center;width:55px;height:23px;border-radius:15px;float:right;background-color: #fd4646; color: #8f1515">Closed</span>
                        @endif
                        <br>
                        <span style="font-size: 1.5em">
                        <a href="/questions/{{$q->id}}">{{$q->question}}</a>
                        </span>
                        <span style="float:right">{{ $q->answers->count() }}@if($q->answers->count()!=1) answers @else answer @endif</span>
                        <div class="col-mid-10" style="margin-bottom: 120px">
                            <span class="col-form-label text-md-left" style="float: left;">
                                @component('parts.PP', ['user' => $q->owner, 'size' => '100px', 'radius' => '100%'])@endcomponent
                            </span>
                            <span class="col-md-4 col-form-label text-md-left" style="float: left;">
                                <a class="nav-item" href="/users/{{ $q->owner->id??"" }}">{{ $q->owner->name??"" }}</a>
                                <br>
                                Created at: {{ $q->created_at }}
                            </span>
                            <span style="float: right">
                                <div style="padding-bottom: 5px">
                                @component('parts.fastFormTemplate', ['action' => 'questions/update', 'button' => 'Edit', 'method' => 'GET', 'color' => 'secondary', 'additional' => 'width: 100px'])
                                    <input type="hidden" name="question_id" value="{{ $q->id }}">
                                @endcomponent
                                </div>
                                @if ($q->status == 'open')
                                    <div style="padding-bottom: 5px">
                                    @component('parts.fastFormTemplate', ['action' => 'questions/close', 'button' => 'Close', 'color' => 'warning', 'additional' => 'width: 100px'])
                                        <input type="hidden" name="question_id" value="{{ $q->id }}">
                                    @endcomponent
                                    </div>
                                @endif
                                @component('parts.fastFormTemplate', ['action' => 'questions/delete', 'button' => 'Delete', 'color' => 'danger', 'additional' => 'width: 100px'])
                                    <input type="hidden" name="question_id" value="{{ $q->id }}">
                                @endcomponent
                            </span>
                        </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $question->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
