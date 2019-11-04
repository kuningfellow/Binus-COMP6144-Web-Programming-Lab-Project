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

                    @if ($post == NULL)
                        The question is not found
                    @else
                        You are viewing a specific question!
                        <br>
                        Author: {{ $post['owner'] }}
                        <br>
                        Topic: {{ $post['topic'] }}
                        <br>
                        Question: {{ $post['question'] }}
                        <br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
