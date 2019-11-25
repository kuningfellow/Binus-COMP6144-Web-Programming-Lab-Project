@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("New Topic") }}</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    @component('parts.topicForm', ['topic' => $topic, 'action' => 'add', 'button' => 'Add'])@endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
