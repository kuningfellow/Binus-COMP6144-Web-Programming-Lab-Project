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
                    <ul>
                        @foreach ($question as $q)
                            <li>{{ $q->question }} , {{ $q->topic }}</li>
                            @component('parts.fastFormTemplate', ['action' => 'questions/close', 'button' => 'close question'])
                                <input type="hidden" name="question_id" value="{{ $q->id }}">
                            @endcomponent
                        @endforeach
                    </ul>
                    {{ $question->links() }}
                    You are viewing some paginated questions!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
