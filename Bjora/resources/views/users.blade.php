@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profiles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
@component('parts.statusMessage')@endcomponent
                    <ul>
                        @foreach ($user as $p)
                            <li>{{ $p->name }} , {{ $p->email }}, {{ $p->password }}</li>
                            @component('parts.fastFormTemplate', ['action' => 'users/updateADMIN', 'method' => 'GET', 'button' => 'Update'])
                                <input type='hidden' name='user_id' value="{{ $p->id }}">
                            @endcomponent
                            @component('parts.fastFormTemplate', ['action' => 'users/delete', 'method' => 'POST', 'button' => 'Delete'])
                                <input type='hidden' name='user_id' value="{{ $p->id }}">
                            @endcomponent
                        @endforeach
                        @component('parts.fastFormTemplate', ['action' => 'users/addADMIN', 'method' => 'GET', 'button' => 'Add'])@endcomponent
                    </ul>
                    You are viewing user list!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
