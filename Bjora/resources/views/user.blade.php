@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $user->name??"N/A" }}</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    @if($user == NULL)
                        User not found...
                    @else
                        <div style="height: 250px">
                            <span style="float: left;">
                                @component('parts.PP', ['user' => $user, 'size' => "200px", 'radius' => '0%'])@endcomponent
                            </span>
                            <span class="col-md-4 col-form-label text-md-left" style="float: left;">
                                {{$user->name}}<br>
                                {{$user->email}}<br>
                                @if ($user->gender == 'male') Male @else Female @endif<br>
                                {{$user->date_of_birth}}<br>
                                {{$user->address}}<br>
                            </span>
                            @if (Auth::user() && Auth::user()->id == $user->id)
                                <span style="float: right">
                                    @component('parts.fastFormTemplate', ['action' => 'users/update', 'method' => 'GET', 'button' => 'Update'])
                                        <input type='hidden' name='user_id' value="{{ $user->id }}">
                                    @endcomponent
                                </span>
                            @endif
                        </div>
                        @if (Auth::user() && Auth::user()->id != $user->id)
                            <form method="POST" action="/messages/add" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <textarea id="message" name="message" placeholder="Type your message here" class="form-control @error('message') is-invalid @enderror" rows=8></textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div class="col-md-10 text-md-left" style="padding-top: 20px">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Message') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
