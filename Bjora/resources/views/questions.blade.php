@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    <div class="form-group col-form-label">
                    @component('parts.fastFormTemplate', ['action' => 'home', 'method' => 'GET', 'button' => 'Search'])
                        <input type='text' width="200" name='search' value="{{ $search??"" }}">
                    @endcomponent
                    </div>
                    @foreach ($question as $q)
                        <div class="col-mid-8" style="margin-bottom: 20px">
                            
                            <div class="col-mid-10">
                                {{ $q->topic }}<br>
                                <a href="/questions/{{$q->id}}">{{$q->question}}</a>
                            </div>
                                {{-- <span class="text-md-right"> --}}
                            <div class="col-mid-10" style="margin-bottom: 90px">
                                <span class="col-form-label text-md-left" style="float: left;">
                                    @component('parts.PP', ['user' => $q->owner, 'size' => '70px', 'radius' => '100%'])@endcomponent
                                </span>
                                <span class="col-md-4 col-form-label text-md-left" style="float: left;">
                                        <a class="nav-item" href="/users/{{ $q->owner }}">{{ $q->owner->name }}</a>
                                        <br>
                                        Created at: {{ $q->created_at }}
                                </span>
                            </div>
                            {{ $q->question }}
                            <br>
                            <a class="btn btn-primary" href="/questions/{{ $q->id }}">Answer</a>
                            {{-- <div class="text-md-left" style="text-align: right">{{ $q->created_at }}</div> --}}
                            {{-- <span class="text-md-right" style="float: right"> --}}
                                {{-- {{ $q->topic }} --}}
                            {{-- </span> --}}
                                {{-- </span> --}}
                            {{-- </span> --}}
                        </div>
                    @endforeach

                    {{-- {{ $question->links() }} <- Search tidak persistent --}}
                    {{ $question->appends(request()->except('page'))->links() }} {{-- <- Pake ini supaya search bisa persistent waktu paginate --}}
                    You are viewing some paginated questions!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
