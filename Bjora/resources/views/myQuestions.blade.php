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
                    {{ Auth::user()->name }}'s questions<br>
                    <div class="form-group row">
                        @foreach ($question as $q)
                        <div class="col-md-6">
                            {{ $q->question }} , {{ $q->topic }}
                            @component('parts.fastFormTemplate', ['action' => 'questions/update', 'button' => 'update question', 'method' => 'GET'])
                                <input type="hidden" name="question_id" value="{{ $q->id }}">
                            @endcomponent
                            @component('parts.fastFormTemplate', ['action' => 'questions/close', 'button' => 'close question'])
                                <input type="hidden" name="question_id" value="{{ $q->id }}">
                            @endcomponent
                            @component('parts.fastFormTemplate', ['action' => 'questions/delete', 'button' => 'delete question'])
                                <input type="hidden" name="question_id" value="{{ $q->id }}">
                            @endcomponent
                        </div>
                        @endforeach
                    </div>
                    {{ $question->links() }}
                    You are viewing some paginated questions!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
