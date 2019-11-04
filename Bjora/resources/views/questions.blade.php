@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session()->has('failure'))
                        <div class="alert alert-danger">
                            {{ session('failure') }}
                        </div>
                    @endif

                    <ul>
                        @foreach ($post as $p)
                            <li>{{ $p->question }} , {{ $p->topic }}</li>
                        @endforeach
                    </ul>
                    {{ $post->links() }}
                    You are viewing some paginated questions!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
