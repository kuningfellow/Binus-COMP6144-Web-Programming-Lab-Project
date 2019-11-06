@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    <div class="col-md-6">
                    @component('parts.fastFormTemplate', ['action' => 'home', 'method' => 'GET', 'button' => 'Search'])
                        {{-- <div class="row form-group"> --}}
                            {{-- <label for="search" class="col-md-4 col-form-label text-md-left">Search</label> --}}
                            <span class="col-md-10" style="float:right">
                                <input id="search" class="form-control" type='text' name='search' value="{{ $search??"" }}" placeholder="Search by Question or Username">
                            </span>
                        {{-- </div> --}}
                    @endcomponent
                    </div>
                    <br><br>
                    @foreach ($question as $q)
                        <div class="col-mid-10" style="margin-bottom: 20px">
                            {{$q->topic }}<br>
                            <a href="/questions/{{$q->id}}">{{$q->question}}</a>
                            <div class="col-mid-10" style="margin-bottom: 90px">
                                <span class="col-form-label text-md-left" style="float: left;">
                                    @component('parts.PP', ['user' => $q->owner, 'size' => '70px', 'radius' => '100%'])@endcomponent
                                </span>
                                <span class="col-md-4 col-form-label text-md-left" style="float: left;">
                                        <a class="nav-item" href="/users/{{ $q->owner->id }}">{{ $q->owner->name }}</a>
                                        <br>
                                        Created at: {{ $q->created_at }}
                                </span>
                            </div>
                            <div style="margin-bottom: 20px">{{ $q->question }}</div>
                            <div style="margin-bottom: 50px"><a class="btn btn-primary" href="/questions/{{ $q->id }}">Answer</a></div>
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
