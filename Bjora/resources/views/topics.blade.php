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
                        @foreach ($topic as $t)
                            <li>{{ $t->topic }}</li>
                            @component('parts.fastFormTemplate', ['action' => 'topics/update', 'method' => 'GET', 'button' => 'Edit'])
                                <input type="hidden" name="topic_id" value="{{ $t->id }}">
                            @endcomponent
                            @component('parts.fastFormTemplate', ['action' => 'topics/delete', 'button' => 'Delete'])
                                <input type="hidden" name="topic_id" value="{{ $t->id }}">
                            @endcomponent
                        @endforeach
                    </ul>
                    @component('parts.fastFormTemplate', ['action' => 'topics/add', 'method' => 'GET', 'button' => 'Add'])@endcomponent
                    You are viewing available topics!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
