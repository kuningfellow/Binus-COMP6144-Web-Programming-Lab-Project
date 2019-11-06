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
                    @component('parts.fastFormTemplate', ['action' => 'home', 'method' => 'GET', 'button' => 'Search'])
                        <input type='text' name='search' value="{{ $search??"" }}">
                    @endcomponent
                    {{-- <ul> --}}
                        @foreach ($question as $q)
                            {{-- <li> --}}
                                    {{-- <div class="col-md-6 text-md-right"> --}}
                                <div class="col-md-10">
                                <a href="/questions/{{$q->id}}">{{$q->question}}</a>
                                {{ $q->topic }}
                                
                                    {{-- </div> --}}
                                </div>
                            {{-- </li> --}}
                        @endforeach
                    {{-- </ul> --}}

                    {{-- {{ $question->links() }} <- Search tidak persistent --}}
                    {{ $question->appends(request()->except('page'))->links() }} {{-- <- Pake ini supaya search bisa persistent waktu paginate --}}
                    You are viewing some paginated questions!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
