@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Profiles</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    @if ($message->count() == 0)
                        You have no messages...
                    @endif
                    @foreach($message as $m)
                        <div class="col-mid-10" style="height: 250px">
                            <span class="col-form-label text-md-left" style="float: left; padding-right: 30px">
                                @component('parts.PP', ['user' => $m->sender, 'size' => '200px', 'radius' => '100%'])@endcomponent
                            </span>
                            <span class="col-md-4 col-form-label text-md-left" style="float: left;">
                                <a class="nav-item" href="/users/{{ $m->sender->id??"" }}">{{ $m->sender->name??"" }}</a>
                                <br>
                                Sent at: {{ $m->created_at }}
                                <br><br>
                                Message: {{ $m->message }}
                            </span>
                            <span style="float: right">
                                @component('parts.fastFormTemplate', ['action' => 'messages/delete', 'button' => 'Delete', 'color' => 'danger'])
                                    <input type='hidden' name='message_id' value="{{ $m->id }}">
                                @endcomponent
                            </span>
                        </div>
                    @endforeach
                    {{ $message->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
