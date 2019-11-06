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
                    <ul>
                        @foreach ($question as $q)
                            <li>
                                <a href="/questions/{{$q->id}}">{{$q->question}}</a>
                                {{ $q->topic }}
                                @component('parts.fastFormTemplate', ['action' => 'questions/close', 'button' => 'Close'])
                                    <input type="hidden" name="question_id" value="{{ $q->id }}">
                                @endcomponent
                                @component('parts.fastFormTemplate', ['action' => 'questions/update', 'method' => 'GET', 'button' => 'Update'])
                                    <input type="hidden" name="question_id" value="{{ $q->id }}">
                                @endcomponent
                                @component('parts.fastFormTemplate', ['action' => 'questions/delete', 'button' => 'Delete'])
                                    <input type="hidden" name="question_id" value="{{ $q->id }}">
                                @endcomponent
                            </li>
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
