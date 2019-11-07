@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update user') }}</div>
                
                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    @component('parts.userForm', ['user' => $user, 'action' => 'update', 'button' => 'Update'])
                        <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                        <input type="hidden" name="role" value="{{ $user['role'] }}">
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
