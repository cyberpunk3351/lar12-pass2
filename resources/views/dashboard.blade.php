@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>Имя: {{ $user }}</h1>
                    <p>Роль: {{ $rolename }}</p>
                    @foreach ($passes as $pass)
                        <p><b>Password:</b> {{ $pass->title }}, <b>Category:</b> {{ $pass->category->title }} <a href="{{ route('edit', ['id'=>$pass->id])}}">edit</a></p>
                    @endforeach
                    <a href="{{ route('create') }}">Создать</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
