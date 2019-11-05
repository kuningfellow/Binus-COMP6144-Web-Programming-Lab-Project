@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new User') }}</div>

                <div class="card-body">
                    @component('parts.userForm', ['user' => $user, 'target' => 'add'])
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select name="role" form="user" class="form-control @error('role') is-invalid @enderror">
                                    <option value="member" @if($user!=NULL && $user['role'] == "member") selected @endif>Member</option> --}}
                                    <option value="admin" @if($user!=NULL && $user['role'] == "admin") selected @endif>Admin</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
