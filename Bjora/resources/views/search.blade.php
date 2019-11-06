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
                            </li>
                        @endforeach
                    </ul>
                    {{-- {{ $question->links() }} --}}
                    You are viewing some paginated searched questions!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
