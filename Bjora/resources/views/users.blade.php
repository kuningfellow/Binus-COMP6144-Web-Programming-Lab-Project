@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Manage Users</div>

                <div class="card-body">
@component('parts.statusMessage')@endcomponent
                    @component('parts.fastFormTemplate', ['action' => 'users/addADMIN', 'method' => 'GET', 'button' => 'Add', 'color' => 'success'])@endcomponent
                    <br>
                    <br>
                    @foreach($users as $u)
                    <div class="col-mid-10" style="height: 250px; margin-bottom: 20px">
                        <div style="height: 230px; padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 20px; box-shadow: -10px 10px #acc4da; background-color: #edf4fa">
                        <span class="col-form-label text-md-left" style="float: left; padding-right: 30px">
                            @component('parts.PP', ['user' => $u, 'size' => '200px', 'radius' => '0%'])@endcomponent
                        </span>
                        <span class="col-md-4 col-form-label text-md-left" style="float: left;">
                            @if ($u->role == 'admin') Admin @else Member @endif
                            <br>
                            <a class="nav-item" href="/users/{{ $u->id }}">{{ $u->name }}</a>
                            <br>
                            Email: {{ $u->email }}
                            <br>
                            Gender: @if ($u->gender == 'male') Male @else Female @endif
                            <br>
                            Date of Birth: {{ $u->date_of_birth }}
                            <br>
                            Address: {{ $u->address }}
                        </span>
                        <span style="float: right">
                            <div style="padding-bottom: 5px">
                            @component('parts.fastFormTemplate', ['action' => 'users/updateADMIN/' , 'method' => 'GET', 'button' => 'Update', 'color' => 'warning', 'additional' => 'width: 100px'])
                                <input type='hidden' name='user_id' value={{ $u->id }}>
                            @endcomponent
                            </div>
                            @component('parts.fastFormTemplate', ['action' => 'users/delete/' , 'button' => 'Remove', 'color' => 'danger', 'additional' => 'width: 100px'])
                                <input type='hidden' name='user_id' value={{ $u->id }}>
                            @endcomponent
                        </span>
                        </div>
                    </div>
                    @endforeach
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
