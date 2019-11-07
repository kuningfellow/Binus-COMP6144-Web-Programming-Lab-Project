@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Question</div>
                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    @component('parts.questionForm', ['question' => $question, 'topic' => $topic, 'action' => 'update', 'button' => 'Update'])
                        <input type="hidden" name="question_id" value="{{ $question['id'] }}">
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
