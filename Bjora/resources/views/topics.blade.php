@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Manage Topics</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    @component('parts.fastFormTemplate', ['action' => 'topics/add', 'method' => 'GET', 'button' => 'Add', 'color' => 'success'])@endcomponent
                    <br>
                    <br>
                    @foreach ($topic as $t)
                        <div class="col-mid-10" style="margin-bottom: 20px">
                            {{ $t->topic }}
                            <span style="float: right">
                                @component('parts.fastFormTemplate', ['action' => 'topics/update', 'method' => 'GET', 'button' => 'Edit', 'color' => 'warning'])
                                    <input type="hidden" name="topic_id" value="{{ $t->id }}">
                                @endcomponent
                                @component('parts.fastFormTemplate', ['action' => 'topics/delete', 'button' => 'Delete', 'color' => 'danger'])
                                    <input type="hidden" name="topic_id" value="{{ $t->id }}">
                                @endcomponent
                            </span>
                        </div>
                    @endforeach
                    {{ $topic->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
