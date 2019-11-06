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
                        You are viewing user {{ $user->name }}'s messages!
                        <ul>
                        @foreach($message as $m)
                            <li>Time: {{ $m->created_at }}<br> From: {{ $m->sender->name }}<br> Message: {{ $m->message }} <br>
                                @component('parts.fastFormTemplate', ['action' => 'messages/delete', 'button' => 'delete message'])
                                    <input type="hidden" name="message_id" value="{{ $m->id }}">
                                @endcomponent
                            </li>
                        @endforeach
                        </ul>
                        {{ $message->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
