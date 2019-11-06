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
                    @if($user == NULL)
                        User not found...
                    @else
                        You are viewing user {{ $user->name }}!
                        @component('parts.fastFormTemplate', ['action' => 'users/update', 'method' => 'GET', 'button' => 'Update'])
                            <input type='hidden' name='user_id' value="{{ $user->id }}">
                        @endcomponent
                        <form method="POST" action="/messages/add" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
                                <div class="col-md-6">
                                    <textarea id="message" name="message" placeholder="Type your message here" class="form-control @error('message') is-invalid @enderror" rows=3></textarea>

                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
