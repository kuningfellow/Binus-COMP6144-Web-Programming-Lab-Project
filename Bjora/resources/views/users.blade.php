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
                        @endforeach
                    </ul>
                    You are viewing user list!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
