@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new User') }}</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    @component('parts.userForm', ['user' => $user, 'target' => 'add'])
                        <input type="hidden" name="role" value="member">
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
