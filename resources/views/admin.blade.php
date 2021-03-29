@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin') }}</div>
                    <div class="card-body">
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>User:</h3>
                            @foreach ($users as $user)
                                <p>{{ $user->name }} | {{ $user->role->title}}</p>
                                @foreach ($user as $role)
                                    <option value="">{{$role->title}}</option>
                                @endforeach
                            @endforeach
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
